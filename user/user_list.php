<div class="mainList">
    <div id="add-user" class="floating-plus">
        <a href="<?php echo $_SERVER["PHP_SELF"].'?v=create'; ?> " title="Add user">
            <i class="fa fa-plus fa-lg" aria-hidden="true" title="Add user"></i>
        </a>
    </div>

    <div class="tablehead">
        <h1>Users</h1>
    </div>
    <table class="userlist-table">
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Password</th>
            <th>User Type</th>
            <th>Email</th>
            <th>Status</th>
            <th colspan="4">Action</th>
        </tr>
        <?php
        for($i=0; $i<20; $i++){
        echo '<tr>
            <td><i class="fa fa-certificate" aria-hidden="true"></i></td>
            <td>Linkon</td>
            <td>Park</td>
            <td>love123</td>
            <td>Admin</td>
            <td>lpark@live.com</td>
            <td>Active</td>
            <td>
                <a href="'.$_SERVER["PHP_SELF"].'?v=edit&id='.$i.'">
                    <i class="fa fa-pencil" aria-hidden="true" title="Edit"></i>
                </a>
            </td>
            <td>
                <a href="'.$_SERVER["PHP_SELF"].'?v=delete&id='.$i.'">
                    <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                </a>
            </td>
            <td>
                <a href="'.$_SERVER["PHP_SELF"].'?v=suspend&id='.$i.'">
                    <i class="fa fa-pause" aria-hidden="true" title="Suspend"></i>
                </a>
            </td>
        </tr>';
        }


        ?>
        
    </table>
</div> 