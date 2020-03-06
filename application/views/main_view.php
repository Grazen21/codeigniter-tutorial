<html>
    <head>
        <title>Main View</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <!-- <h1>Welcome to my CodeIgniter tutorial Main view</h1>
        <h2><?= $title?></h2>
        <h2><?= $test1?></h2>
        <h2><?= $model_function?></h2> -->
        <div class="container">
            <h3>Insert data using CodeIgniter</h3>
            <form method="post" action="<?= base_url()?>index.php/main/form_validation">

                <?php 
                    if($this->uri->segment(2)== "inserted") {
                        echo '<p class="text-success">Data Inserted</p>';
                    };
                ?>

                <?php
                    if(isset($user_data)) {
                        foreach($user_data->result() as $row) {
                            ?>
                            <div class="form-group">
                                <label>Enter First Name</label>
                                <input type="text" name="first_name" value="<?= $row->first_name;?>" class="form-control"/>
                                <span class="text-danger"><?= form_error("first_name");?></span>

                                <label>Enter Last Name</label>
                                <input type="text" name="last_name" value="<?= $row->last_name;?>" class="form-control"/>
                                <span class="text-danger"><?= form_error("last_name");?></span>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="hidden_id" value="<?= $row->id;?>"/>
                                <input type="submit" name="update" value="Update" class="btn btn-info"/>
                            </div>
                            <?php
                        }
                    }else {
                ;?>

                <div class="form-group">
                    <label>Enter First Name</label>
                    <input type="text" name="first_name" class="form-control"/>
                    <span class="text-danger"><?= form_error("first_name");?></span>

                    <label>Enter Last Name</label>
                    <input type="text" name="last_name" class="form-control"/>
                    <span class="text-danger"><?= form_error("last_name");?></span>
                </div>
                <div class="form-group">
                    <input type="submit" name="insert" value="Insert" class="btn btn-info"/>
                </div>

                <?php
                    }
                ;?>
            </form>
            <h3>Fetch data from table using Codeigniter</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                    <?php if ($fetch_data->num_rows() > 0) {
                        foreach($fetch_data->result() as $row) {
                            ?>
                                <tr>
                                    <td><?= $row->id;?></td>
                                    <td><?= $row->first_name;?></td>
                                    <td><?= $row->last_name;?></td>
                                    <td><a href="#" class="delete_data" id="<?= $row->id; ?>">Delete</a></td>
                                    <td><a href="<?= base_url();?>index.php/main/update_data/<?= $row->id;?>">Edit</a></td>
                                </tr>
                            <?php
                        }
                    }else {
                    ?>
                        <tr>
                            <td colspan='3'>No data found</td>
                        </tr>
                    <?php
                    };
                    ?>
                </table>
            </div>
            <script>
                $(document).ready(function(){
                    $('.delete_data').click(function(){
                        let id= $(this).attr("id");
                        if(confirm("Are you sure you want to delete this?")) {
                            window.location="<?= base_url();?>index.php/main/delete_data/"+id;
                        }else {
                            return false;
                        }
                    });
                });
            </script>
        </div>
    </body>
</html>