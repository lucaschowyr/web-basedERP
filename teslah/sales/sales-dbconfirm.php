<?php

session_start();   

include_once './functions/functions.php';
include_once '../includes/dbconnect.php';

userSession('Sales');

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('tables','sales');
?>

<!-- Page Content -->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Sales Data</h1>
        </div> 

        <?php
        if (!empty($_POST['transaction_id']) && $_POST['action'] == 'Update') {
            
            echo 
            "<form action='includes/dbupdate.php?table=sales' method='POST'>
            <div class='alert alert-warning' role='alert'>
            Are you sure you want to permanently update the following record(s) from the database?
            </div>
            <div class='table-responsive py-3'>";
            
        } else if (!empty($_POST['transaction_id']) && $_POST['action'] == 'Delete') {
            
            echo
            "<form action='includes/dbdelete.php?table=sales' method='POST'>
            <div class='alert alert-danger' role='alert'>
            Are you sure you want to permanently update the following record(s) from the database?
            </div>
            <div class='table-responsive py-3'>";

        }
        ?>

      
        
        <?php

            if ($_POST['action'] == 'Update') {

                if(!empty($_POST['transaction_id'])) {

                    echo "<table class='table table-striped table-sm'>";
                    echo "<thead><tr><th scope='col'>" . 'select'
                            . "</th><th scope='col'>" . 'transaction_id'
                            . "</th><th scope='col'>" . 'date'
                            . "</th><th scope='col'>" . 'product_id'
                            . "</th><th scope='col'>" . 'product'
                            . "</th><th scope='col'>" . 'model'
                            . "</th><th scope='col'>" . 'qty'
                            . "</th><th scope='col'>" . 'customer_name'
                            . "</th><th scope='col'>" . 'salesperson_name'
                            . "</th><th scope='col'>" . 'employee_id'
                            . "</th><th scope='col'>" . 'country'
                            . "</th></tr></thead>";
                    echo "<tbody>";

                    // print options function

                    function printOptions($item, $option) { //$row['product'], Car
                        echo "<option value='".$option."'";
                        if ($item == $option) {
                            echo "selected";
                        }
                        echo ">".$option."</option>'";
                    };

                    foreach($_POST['transaction_id'] as $selectedID) {
                    $sql = "SELECT * FROM sales WHERE transaction_id=$selectedID;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck >0){                        
                            
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                
                                echo "<tr><td><input type='checkbox' name='transaction_id[]' value='". $row['transaction_id']."' checked>"
                                . "</td><td>" . $row['transaction_id'] 
                                . "</td><td>" . $row['date']
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fProductID[]' value='" . $row['product_id'] . "'required>"
                                . "</td><td>" //$row['product']
                                . "<select name='fProduct[]' required>";
                                printOptions($row['product'], 'Car');
                                printOptions($row['product'], 'Charging Parts');
                                printOptions($row['product'], 'Car Accessories');
                                printOptions($row['product'], 'Car Parts');
                                // echo "<option value='Car'"; if ($row['product']=='Car') { echo 'selected'; } echo ">Car</option>
                                // <option value='Charging Parts'"; if ($row['product']=='Charging Parts') { echo 'selected'; } echo ">Charging Parts</option>
                                // <option value='Car Accessories'"; if ($row['product']=='Car Accessories') { echo 'selected'; } echo ">Car Accessories</option>
                                // <option value='Car Parts'"; if ($row['product']=='Car Parts') { echo 'selected'; } echo ">Car Parts</option>";
                                echo "</select>"
                                . "</td><td>" // $row['model']
                                . "<select name='fModel[]' required>";
                                printOptions($row['model'], 'Model Y');
                                printOptions($row['model'], 'Model X');
                                printOptions($row['model'], 'Model 3');
                                printOptions($row['model'], 'Model S');
                                printOptions($row['model'], 'Gen 1 NEMA Adapter');
                                printOptions($row['model'], 'Gen 1 NEMA Adapter');
                                printOptions($row['model'], 'Car Cover');
                                printOptions($row['model'], 'Wireless Phone Charger');
                                printOptions($row['model'], 'Wiper Blade');
                                printOptions($row['model'], 'HEPA Air Filtration Upgrade');
                                // echo "<option value='Model Y'"; if ($row['model']=='Model Y') { echo 'selected'; } echo ">Model Y</option>
                                // <option value='Model X'"; if ($row['model']=='Model X') { echo 'selected'; } echo ">Model X</option>
                                // <option value='Model 3'"; if ($row['model']=='Model 3') { echo 'selected'; } echo ">Model 3</option>
                                // <option value='Model S'"; if ($row['model']=='Model S') { echo 'selected'; } echo ">Model S</option>
                                // <option value='Gen 1 NEMA Adapter'"; if ($row['model']=='Gen 1 NEMA Adapter') { echo 'selected'; } echo ">Gen 1 NEMA Adapter</option>
                                // <option value='Gen 2 NEMA Adapter'"; if ($row['model']=='Gen 2 NEMA Adapter') { echo 'selected'; } echo ">Gen 2 NEMA Adapter</option>
                                // <option value='Car Cover'"; if ($row['model']=='Car Cover') { echo 'selected'; } echo ">Car Cover</option>
                                // <option value='Wireless Phone Charger'"; if ($row['model']=='Wireless Phone Charger') { echo 'selected'; } echo ">Wireless Phone Charger</option>
                                // <option value='Wiper Blade'"; if ($row['model']=='Wiper Blade') { echo 'selected'; } echo ">Wiper Blade</option>
                                // <option value='HEPA Air Filtration Upgrade'"; if ($row['model']=='HEPA Air Filtration Upgrade') { echo 'selected'; } echo ">HEPA Air Filtration Upgrade</option>";
                                echo "</select>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fQty[]' value='" . $row['qty'] . "'required>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fCustomerName[]' value='" . $row['customer_name'] . "'required>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fSalespersonName[]' value='" . $row['salesperson_name'] . "'required>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fEmployeeID[]' value='" . $row['employee_id'] . "'required>"
                                . "</td><td>" // $row['country']
                                ."<select name='fCountry[]' required>";
                                printOptions($row['country'], 'Singapore');
                                printOptions($row['country'], 'China');
                                printOptions($row['country'], 'Vietnam');
                                // echo  "<option value='Singapore'"; if ($row['country']=='Singapore') { echo 'selected'; } echo ">Singapore</option>
                                //   <option value='China'"; if ($row['country']=='China') { echo 'selected'; } echo ">China</option>
                                //   <option value='Vietnam'"; if ($row['country']=='Vietnam') { echo 'selected'; } echo ">Vietnam</option>";
                                echo "</select>"
                                . "</td></tr>";
                            };

                        } else {
                        echo "0 results";
                        }

                    } echo "</tbody></table>";
                } else {
                    echo
                    "<div class='alert alert-secondary' role='alert'>
                    No data was selected.
                    </div>
                    <div class='table-responsive py-3'>";
            }


            
            } else if ($_POST['action'] == 'Delete') {

                if(!empty($_POST['transaction_id'])) {

                    echo "<table class='table table-striped table-sm'>";
                    echo "<thead><tr><th scope='col'>" . 'select'
                            . "</th><th scope='col'>" . 'transaction_id'
                            . "</th><th scope='col'>" . 'date'
                            . "</th><th scope='col'>" . 'product_id'
                            . "</th><th scope='col'>" . 'product'
                            . "</th><th scope='col'>" . 'model'
                            . "</th><th scope='col'>" . 'qty'
                            . "</th><th scope='col'>" . 'customer_name'
                            . "</th><th scope='col'>" . 'salesperson_name'
                            . "</th><th scope='col'>" . 'employee_id'
                            . "</th><th scope='col'>" . 'country'
                            . "</th></tr></thead>";
                    echo "<tbody>";

                    foreach($_POST['transaction_id'] as $selectedID) {
                    $sql = "SELECT * FROM sales WHERE transaction_id=$selectedID;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck >0){
                        
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr><td><input type='checkbox' name='transaction_id[]' value='". $row['transaction_id']."' checked>"
                            . "</td><td>" . $row['transaction_id']
                            . "</td><td>" . $row['date']
                            . "</td><td>" . $row['product_id']
                            . "</td><td>" . $row['product']
                            . "</td><td>" . $row['model']
                            . "</td><td>" . $row['qty']
                            . "</td><td>" . $row['customer_name']
                            . "</td><td>" . $row['salesperson_name']
                            . "</td><td>" . $row['employee_id']
                            . "</td><td>" . $row['country']
                            . "</td></tr>";
                        };

                        } else {
                        echo "0 results";
                        }

                    } echo "</tbody></table>";
                } else {
                    echo
                    "<div class='alert alert-secondary' role='alert'>
                    No data was selected.
                    </div>
                    <div class='table-responsive py-3'>";
                }

            }

        ?>

        </div>

        <div class="text-center">
                        
            <?php
            if (!empty($_POST['transaction_id']) && $_POST['action'] == 'Update') {

            echo
            "<button type='button' class='btn btn-secondary mx-2'>
            <a href='sales-table.php' style='all:unset'>Cancel</a>
            </button>
            <button type='submit' class='btn btn-warning'>Confirm Update</button>";

            } else if (!empty($_POST['transaction_id']) && $_POST['action'] == 'Delete') {

            echo
            "<button type='button' class='btn btn-secondary mx-2'>
            <a href='sales-table.php' style='all:unset'>Cancel</a>
            </button>
            <button type='submit' class='btn btn-danger'>Confirm Delete</button>";

            } else {
            
            echo
            "<button type='button' class='btn btn-primary mx-2'>
            <a href='sales-table.php' style='all:unset'>Go Back</a>
            </button>";
            
            }
            ?>
        
      </div>

    </form>


    </main>

<?php templateFooter(); ?>
