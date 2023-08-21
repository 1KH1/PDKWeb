<?php 


function find_all_trainee(){ 
    global $db; 

    $sql = "SELECT * FROM trainee";
    $sql .= "ORDER BY name ASC"; 
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}


function find_trainee_by_id($id){

    global $db; 

    $sql = "SELECT * FROM trainee"; 
    $sql .= " WHERE TR_Id=".db_escape($db,$id);
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $trainee = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $trainee; 
}


// Trainee 
function insert_trainee($trainee){ 

    global $db;

    $sql = "INSERT INTO trainee"; 
    $sql .=" (TR_Name,TR_Ic,TR_Reg,TR_Gender,TR_Ethnicity,TR_Religion,TR_Phone,TR_Address)"; 
    $sql .= "VALUES (";
    $sql.="'".db_escape($db, $trainee['trainee-name'])."',";
    $sql.="'".db_escape($db, $trainee['trainee-ic'])."',";
    $sql.="'".db_escape($db, $trainee['trainee-reg'])."',"; 
    $sql.="'".db_escape($db, $trainee['trainee-gender'])."',";
    $sql.="'".db_escape($db, $trainee['trainee-ethnicity'])."',";
    $sql.="'".db_escape($db, $trainee['trainee-religion'])."',";
    $sql.="'".db_escape($db, $trainee['trainee-phone'])."',";
    $sql.="'".db_escape($db, $trainee['trainee-address'])."'";
    $sql.= ");";

    $result = mysqli_query($db, $sql);  
    if($result){
        return true;
    }else{ 
        echo mysqli_error($db);
        db_disconnect($db);
    exit;
    }
}

// Trainee Parents 
function insert_tpp($tpp){ 

    global $db; 

    $sql = "INSERT INTO traineeparents"; 
    $sql.="(TR_Id,TPP_FullName, TPP_Ic, TPP_Relation, TPP_Gender, TPP_Phone, TPP_Occupation, TPP_Salary)"; 
    $sql.= "VALUES (";
    $sql.="'".db_escape($db, $tpp['tr-id'])."',";
    $sql.="'".db_escape($db, $tpp['tpp-name'])."',";
    $sql.="'".db_escape($db, $tpp['tpp-ic'])."',";
    $sql.="'".db_escape($db, $tpp['tpp-relation'])."',"; 
    $sql.="'".db_escape($db, $tpp['tpp-gender'])."',";
    $sql.="'".db_escape($db, $tpp['tpp-phone'])."',";
    $sql.="'".db_escape($db, $tpp['tpp-occupation'])."',";
    $sql.="'".db_escape($db, $tpp['tpp-salary'])."'";
    $sql.= ");";

    $result = mysqli_query($db, $sql);

    if($result){
        return true;
    }else{ 
        echo mysqli_error($db);
        db_disconnect($db);
    exit;
    }
}

// Trainee Ability
function insert_ta($ta){ 

    global $db; 

    $sql = "INSERT INTO traineeability"; 
    $sql.="(TA_Category, TA_Okulevel, TA_Disease, TA_Attitude, TA_Mobility,TR_Id)"; 
    $sql.= "VALUES (";
    $sql.="'".db_escape($db, $ta['ta-category'])."',";
    $sql.="'".db_escape($db, $ta['ta-okulevel'])."',";
    $sql.="'".db_escape($db, $ta['ta-disease'])."',"; 
    $sql.="'".db_escape($db, $ta['ta-attitude'])."',";
    $sql.="'".db_escape($db, $ta['ta-mobility'])."',";
    $sql.="'".db_escape($db, $ta['tr-id'])."'";
    $sql.= ");";

    $result = mysqli_query($db, $sql);

    if($result){
        return true;
    }else{ 
        echo mysqli_error($db);
        db_disconnect($db);
    exit;
    }
}

// Trainee Additional

function insert_taa($taa){ 

    global $db; 
    $lastid=mysqli_insert_id($db);

    $sql = "INSERT INTO traineeadditional"; 
    $sql.="(TR_Id,TAA_SchStatus, TAA_SchName, TAA_SchClass, TAA_SchYear)"; 
    $sql.= "VALUES (";
    $sql.="'".db_escape($db, $taa['tr-id'])."',";
    $sql.="'".db_escape($db, $taa['taa-schstatus'])."',";
    $sql.="'".db_escape($db, $taa['taa-schname'])."',";
    $sql.="'".db_escape($db, $taa['taa-schclass'])."',"; 
    $sql.="'".db_escape($db, $taa['taa-schyear'])."'";
    $sql.= ");";

    $result = mysqli_query($db, $sql);

    if($result){
        return true;
    }else{ 
        echo mysqli_error($db);
        db_disconnect($db);
    exit;
    }
}


function update_trainee($trainee){ 
    global $db; 

    $sql = "UPDATE trainee SET "; 
    $sql.= "TR_Name= '".db_escape($db, $trainee['trainee-name'])."',";
    $sql.= "TR_Ic= '".db_escape($db, $trainee['trainee-ic'])."',";
    $sql.= "TR_Reg= '".db_escape($db, $trainee['trainee-reg'])."',"; 
    $sql.= "TR_Gender= '".db_escape($db, $trainee['trainee-gender'])."',";
    $sql.= "TR_Ethnicity= '".db_escape($db, $trainee['trainee-ethnicity'])."',";
    $sql.= "TR_Religion= '".db_escape($db, $trainee['trainee-religion'])."',";
    $sql.= "TR_Phone= '".db_escape($db, $trainee['trainee-phone'])."',";
    $sql.= "TR_Address='".db_escape($db, $trainee['trainee-address'])."'";
    $sql.= "WHERE TR_Id= ".db_escape($db, $trainee['id']);
    $sql.= " LIMIT 1";
    
    $result = mysqli_query($db, $sql);

    if($result){
        return true;
    }else{ 
        echo mysqli_error($db);
        db_disconnect($db);
    exit;
    }
}


function delete_trainee($id){

    global $db; 

    $sql = "DELETE FROM Trainee";
    $sql .= " WHERE TR_Id= ".db_Escape($db,$id)."";
    $result = mysqli_query($db,$sql);
    echo $sql; 
    if($result){
        return true;
    }else{ 
        echo mysqli_error($db);
        db_disconnect($db);
    exit;
    }
}



?> 



