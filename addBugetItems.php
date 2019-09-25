<?php
	ob_start();
    session_start();
    echo($_SESSION['Budget_id']);
    require_once "./PHP/database.php";
    if(!isset($_SESSION['email'])){
         header("Location: login.php");
    }else{
        $sql = "SELECT * FROM Priority ";
        $result = $conn->query($sql);
        $res = $conn->query($sql);
        $priorities= $result->fetch(PDO::FETCH_ASSOC);
    }
    
?>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        //===CREATE BUDGET AND TOTAL AMOUNT
        $item = $_POST['item'];
        $budget_name = $_SESSION['Budget_id'];
        $description = $_POST['description'];
        $priority = $_POST['priorities'];
        $amount = $_SESSION['Amount'];
        $itemAmount = 0;
        $percent=0;;
        $i=0;
        foreach($priority as $p){
           $percent=$percent+$p;
        }
        foreach($item as $it){
          $itemAmount = round(($priority[$i]/$percent)* $amount);
          echo($itemAmount);
          $insert = "INSERT INTO BudgetDetails (id,item,description,Priority,Amount,Budget_id)
					VALUES( null, '$it',  '$description[$i]','$priority[$i]','$itemAmount','{$_SESSION['Budget_id']}')";
        $exe = $conn->exec($insert);
        $i++;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="addBudgetAmount.css">
    <script src="https://kit.fontawesome.com/833e0cadb7.js" crossorigin="anonymous"></script>
    <title>KymoBudget</title>
</head>
<body class="">
    <header>

        <nav>
            <div class="brandname">
                <h2 class="header-brandname"><a href="#"> <span class="redText">Kymo</span> Budget</a></h2>
            </div>
            <a href="logout.php" class="dropdown-item"> Logout</a><br>

            <img class='user-avatar' src="images/user.png" alt="">
            <div class="dropdown">
                    <div class="dropdown-toggler" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="images/drop.png" alt="">
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>

        </nav>

    </header>

    <main>

        <section class="sidebar">

            <ul class="sidebar-list">
                <li><i class="fas fa-home"></i> Dashboard</li>
                <li><i class="fas fa-plus-circle"></i> Add Budget Items</li>
                <li class="active"> <i class="fas fa-plus-circle"></i> Add Items</li>
            </ul>
        </section>

        <section class="add-budget">
                <form class="add-budget-form" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
                <label for="reference" class="control-label">Budget Title<span class="required">*</span></label>
                <h2><?php echo ($_SESSION['Budget_id']);?></h2><br>

                    <h4>Add Budget Item</h4>
                    <label for="reference" class="control-label">Select Items<span class="required">*</span></label>
                         <!-- <div class="col-md-12"> -->
                            <div class="col-md-3">
                                <input type="checkbox" name="checkbox" id="checkbox" description="income tax" value="tax"> <b>Tax<b>
                            </div> <div class="col-md-3">
                                <input type="checkbox" name="checkbox" id="checkbox" value="Insurance"> <b>Insurance<b>
                            </div>
                            
                            <div class="col-md-3">
                                <input type="checkbox" name="checkbox" id="checkbox" value="Shopping"> <b>Shopping<b>
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="checkbox" id="checkbox"value="Health"> <b>Health<b>
                            </div>
                        <!-- </div>  
                         <div class="col-md-12"> -->
                            <div class="col-md-3">
                                <input type="checkbox" name="checkbox" id="checkbox" value="Investments"> <b>Investments<b>
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="checkbox" id="checkbox" value="Rent"> <b>Rent<b>
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="checkbox" id="checkbox" value="Baby"> <b>Baby<b>
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="checkbox" id="checkbox" value="pet" on> <b>pet<b>
                            </div>
                        <!-- </div>        -->
                        <div class="form-row margin-height">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="reference" class="control-label">Add Your Items<span class="required">*</span></label>
                                <div class="table-responsive">
                            
                                    <table class="table table-stripped table-bordered" id="invoice">
                                        <thead>
                                            <th>Item <span class="required">*</span></th>
                                            <th>Description </th>
                                            <th>Priority <span class="required">*</span></th>
                                            <th>Action </th>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>    
                            </div> 
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success" id="add-row"><i class="fa fa-plus"></i> Add
                                    Item</button>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn budget-save text-center">Save</button>
                      </form>

        </section>


    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script >
    $(document).ready(function(){
    $("#add-row").click(function(){
        let rows = +($('table tbody tr.itemRows').length) + Math.floor(1000 + Math.random() * 9000);
        let markup ="<tr class='itemRows' row='"+ rows +"'><td><input name='item[]' id='item' type='text' row='"+rows+"' class='form-control' value='' required></td><td><input name='description[]' id='description' type='text' row='"+ rows +"' class='form-control' value='' ></td><td><div class='input-group'><select name='priorities[]' class='form-control' id='priority_id' row='"+rows+"' ><?php do{ ?><option value='<?php echo ($priorities['percent']); ?>' percentage='<?php echo ($priorities['percent']); ?>'><?php echo ($priorities['priority']); ?></option> <?php }while($priorities= $result->fetch(PDO::FETCH_ASSOC))?></select></td><td><button type='button' onclick=' return deleteRow(this)' class='btn btn-danger' style='width:100%;'><i class='fa fa-trash'></i>Delete Item</button></td></tr>";
         $("table tbody").append(markup);
    });

    $('input[name=checkbox]').change(function(){
        if($(this).is(':checked')) {
            let rows = +($('table tbody tr.itemRows').length) + Math.floor(1000 + Math.random() * 9000);
            let v =$(this)[0].value;
           
            let markup ="<tr class='itemRows' row='"+ rows +"'><td><input name='item[]' id='item' type='text' row='"+rows+"' class='form-control' value='"+v+"' required></td><td><input name='description[]' id='description' type='text' row='"+ rows +"' class='form-control' value='' ></td><td><div class='input-group'><select name='priorities[]' class='form-control' id='priority_id' row='"+rows+"' '> <?php while($priorities= $res->fetch(PDO::FETCH_ASSOC)){?><option value='<?php echo ($priorities['percent']); ?>' percentage='<?php echo ($priorities['percent']); ?>''> <?php echo $priorities['priority']; ?></option> <?php } ?></select></td><td><button type='button' onclick=' return deleteRow(this)' class='btn btn-danger' style='width:100%;'><i class='fa fa-trash'></i>Delete Item</button></td></tr>";
            $("table tbody").append(markup);
        } else {
           //
        }
        
    });

});    

function deleteRow(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("invoice").deleteRow(i);
}
</script>
</body>
</html>