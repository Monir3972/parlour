<?php
include ('../db.php');

$return_data = array();

session_start();

$req = isset($_POST['req']) ? $_POST['req'] : 0;
$param = isset($_POST['param']) ? $_POST['param'] : 0;
$data = isset($_POST['data']) ? $_POST['data'] : 0;
$field_list = isset($_POST['get']) ? $_POST['get'] : '*';
$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
$multi_select = isset($_POST['msel']) ? $_POST['msel'] : 0;
$match_id = isset($_POST['match']) ? $_POST['match'] : 0;

switch ($req)
{
        //  for employee list
        
    case '1':
        $table = 'parlars';
    break;
     case '2':
        $table = 'sales_records';
    break;

      
    default:
        $table = '';

}

// parameter
// ------------------------------------------------------------------
switch ($param)
{

        case '1':
         $sql = 'SELECT * FROM ' . $table;
        // $sql .= ($filter!='')? ' AND '.$filter : '' ;
         $return_data = getSelectHTMLDept($sql, $match_id, '', $multi_select, true);
         break;
        case '2': 
        $sql = 'SELECT *,(SELECT parlar_name from parlars WHERE id=`parlar_id`) as parlar_name FROM sales_records ORDER BY id DESC';
        // $sql = 'SELECT * FROM '.$table.' WHERE status = 1 ORDER BY id DESC';
		  $return_data = getHTML_empTable($sql,true);
		break;

        case '3': 
         $sql = 'SELECT * FROM '.$table.' WHERE  '.$data;
         $return_data = getHTML_empEditModal($sql,true);   
         break;

        case '4': 
        $sql ='SELECT * FROM '.$table.' WHERE `is_active` = 1';
        $return_data = getSelectedHTML_lists($sql,$match_id,'',$multi_select,true);
        break;
    }

    echo json_encode($return_data);

    function getSelectHTMLDept($sql, $matchID, $field_name, $multisel = false, $optOnly = false)
    {
        global $con, $filter;
        try
        {
            $multi = ($multisel) ? 'multiple="multiple"' : '';
            $field_name = ($multisel) ? $field_name . '[]' : $field_name;
            $rHTML = '<select class="chosen-select sel2 width-100" ' . $multi . ' id="' . $field_name . '" name="' . $field_name . '">';
            $rHTML = ($optOnly) ? '' : $rHTML;
            $rHTML .= ($multisel) ? '<option value="-1">ALL</option>' : '<option value="0" selected>-- Select --</option>';

            $stmt = $con->prepare($sql, array(
                PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
            ));
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
            {
                if ($row['id'] == $matchID) $rHTML = $rHTML . '<option value="' . $row['id'] . '" selected>' . $row['parlar_name'] . '</option>';
                else $rHTML = $rHTML . '<option value="' . $row['id'] . '">' . $row['parlar_name'] . '</option>';
            }
            $rHTML = ($optOnly) ? $rHTML : $rHTML . '</select>';
        }
        catch(PDOException $e)
        {
            $rHTML = $e->getMessage();
        }

        return $rHTML;
    }
    function getHTML_empTable($sql)
	{
		global $con;
		try
		{
			$bHTML = '';
			$stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$stmt->execute();
			$c = 1;
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
			{
				$bHTML .= '
							<tr>
	                          	<th scope="row"> '.$c.' </th> 
	                            <td> '.$row['parlar_name'].' </td> 
	                            <td> '.$row['net_sales'].' </td> 
	                            <td> '.$row['vat'].' </td> 
	                            <td> '.$row['gross'].' </td>
	                            <td> '.$row['received_date'].' </td> 
	           
	                            <td> '.$row['entry_date'].' </td> 
	                            <td>
	                                <button type="button" class="btn btn-default btn-sm" id="edit_id" data-id='.$row["id"].'><i class="fas fa-edit"></i></button>
	                            </td>
	                        </tr>  
                          ';
                          $c++;
			}

			$rHTML =  $bHTML;
		}
		catch (PDOException $e) 
		{
			$rHTML = $e->getMessage();
		}
		
		return $rHTML;
	}

        function getHTML_empEditModal($sql)
    {
        global $con;
        try
        {
            $bHTML = '';
            $stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            $row = $stmt->fetchall(PDO::FETCH_ASSOC);
            
            
            $rHTML =  $row;
        }
        catch (PDOException $e) 
        {
            $rHTML = $e->getMessage();
        }
        
        return $rHTML;
    }
     function getSelectedHTML_lists($sql, $matchID, $field_name, $multisel = FALSE, $optOnly = FALSE)
    {
        global $con, $filter;
        try
        { 
            $multi = ($multisel) ? 'multiple="multiple"' : '';
            $field_name = ($multisel) ? $field_name.'[]' : $field_name;
            $rHTML = '<select class="chosen-select sel2 width-100" '.$multi.' id="'.$field_name.'" name="'.$field_name.'">';
            $rHTML = ($optOnly) ? '' : $rHTML;
            $rHTML .= ($multisel) ? '<option value="-1">-- Select --</option>' : '<option value="0" disabled>-- Select --</option>';
            
            $stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) 
            {
                if($row['id'] == $matchID)
                    $rHTML = $rHTML . '<option value="'.$row['id'].'" selected>'.$row['parlar_name'].'</option>';
                else
                    $rHTML = $rHTML . '<option value="'.$row['id'].'">'.$row['parlar_name'].'</option>';
            }
            $rHTML = ($optOnly) ? $rHTML : $rHTML . '</select>';
        }
        catch (PDOException $e) 
        {
            $rHTML = $e->getMessage();
        }
        
        return $rHTML;
    }
?>
