<?php
include_once "formula.inc.php";
include_once "palabrasRaras.inc.php";
class RepositorioFormula{
    public static function obtenerTodo($connection){
        $formulas=array();
        if(isset($connection))
        {
            try{
                $sql="SELECT * FROM formulas";
                $sentencia = $connection ->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if(count($resultado))
                {
                    foreach($resultado as $fila)
                    {
                        $formulas[]=new Formula($fila["id"], $fila["nombre"], $fila["subtema"], $fila["tema"], $fila["tags"], $fila["descripcion"]);
                    }
                }
                else{
                    echo HOLI . " NO HAY FORMULAS";
                }
            }catch(PDOException $ex){
                print HOLIERROR . $ex->getMessage();
            }
        }
        return $formulas;
    }
    public static function obtenerTemas($connection)
    {
        $temas=array();
        $temasUnicos=array();
        $formulas=RepositorioFormula::obtenerTodo($connection);
        for($i=0; $i<sizeof($formulas); $i++)
        {
            $temas[$i]=$formulas[$i]->obtenerTema();
        }
        $temas=array_unique($temas);
        sort($temas);
        return $temas;
    }
    public static function obtenerSubtemas($formulas)
    {
        $subtemas=array();
        for($i=0; $i<sizeof($formulas); $i++)
        {
            $subtemas[$i]=$formulas[$i]->obtenerSubtema();
        }
        $subtemas=array_unique($subtemas);
        sort($subtemas);
        return $subtemas;
    }
    public static function temaExiste($connection, $tema){
        $tema=palabrasRaras::arreglar($tema);
        $temas=RepositorioFormula::obtenerTemas($connection);

        $existe=(in_array($tema, $temas)) ? true : false;
        if(!$existe)
        {$temas[1]=trim($temas[1]); $existe=(in_array($tema, $temas)) ? true : false;}
        return $existe;
    }
    public static function subtemaExiste($connection, $subtema){
        $subtema=palabrasRaras::arreglar($subtema);
        $subtemas=RepositorioFormula::obtenerSubtemas(RepositorioFormula::obtenerTodo($connection));
        $existe=(in_array($subtema, $subtemas)) ? true : false;
        return $existe;
    }
    public static function obtenerPorTemas($connection, $tema){
        if(isset($connection))
        {
            $subtemas=array();
            try{
                $sql="SELECT * FROM formulas WHERE tema=:tema";
                $sentencia = $connection ->prepare($sql);
                $sentencia->bindParam(':tema', $tema);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if(count($resultado))
                {
                    foreach($resultado as $fila)
                    {
                        $subtemas[]=new Formula($fila["id"], $fila["nombre"], $fila["subtema"], $fila["tema"], $fila["tags"], $fila["descripcion"]);
                    }
                }
                else{
                    echo HOLI . " NO HAY FORMULAS";
                }
            }catch(PDOException $ex){
                print HOLIERROR . $ex->getMessage();
            }
        }
        return $subtemas;
    }
    public static function obtenerPorSubtemas($connection, $subtema)
    {
        if(isset($connection))
        {
            $formulas=array();
            try{
                $sql="SELECT * FROM formulas WHERE subtema=:subtema";
                $sentencia = $connection ->prepare($sql);
                $sentencia->bindParam(':subtema', $subtema);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if(count($resultado))
                {
                    foreach($resultado as $fila)
                    {
                        $formulas[]=new Formula($fila["id"], $fila["nombre"], $fila["subtema"], $fila["tema"], $fila["tags"], $fila["descripcion"]);
                    }
                }
            }
            catch(PDOException $ex){
                print HOLIERROR . $ex->getMessage();
            }
        }
        return $formulas;
    }
    public static function obtenerFormulas($connection, $subtema)
    {
        $temas=array();
        $formulas=RepositorioFormula::obtenerPorSubtemas($connection, $subtema);
        for($i=0; $i<sizeof($formulas); $i++)
        {
            $temas[$i]=$formulas[$i]->obtenerTema();
        }
        return array_unique($temas);
    }
    public static function formulaExiste($connection, $formula)
    {
        $formulaExiste=false;
        if(isset($connection))
        {
            try{
                $sql="SELECT * FROM formulas WHERE nombre=:nombre";
                $sentencia = $connection ->prepare($sql);
                $sentencia -> bindParam(":nombre", $formula, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia ->fetchAll();
                if(count($resultado))
                    $formulaExiste=true;

            }catch(PDOException $ex){
                print HOLIERROR . $ex->getMessage();
            }
        }
        return $formulaExiste;
    }
    public static function obtenerFormulaPorNombre($connection, $nombre)
    {
        $formula=null;
        if(isset($connection))
        {
            try{
                $sql="SELECT * FROM formulas WHERE nombre=:nombre";
                $sentencia = $connection -> prepare($sql);
                $sentencia -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                if(!empty($resultado))
                {
                    $formula = new Formula($resultado["id"], $resultado["nombre"], $resultado["subtema"], $resultado["tema"], $resultado["tags"], $resultado["descripcion"]);
                }
            }catch(PDOException $ex) 
            { 
                print HOLIERROR . $ex->getMessage(); 
            }
        }
        return $formula;

    }
    public static function resumirTitulo($titulo)
    {
        $longMax=10;
        $resultado="";
        if(strlen($titulo)>=$longMax)
        {
        $resultado=substr($titulo, 0, $longMax);
        $resultado.="...";
        }
        else {
        $resultado=$titulo;
        }
        return $resultado;
    }

}


?>