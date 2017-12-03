<link rel="stylesheet" href="css/createuser.css">
<div class="createUser">
    <form class="modify-user-form" action="#" method="POST">
        <div class="tablehead">
            <h1>Create User</h1>
        </div>
        <table>
            <tr>
                <td>Firstname:</td>
                <td><input type="text" placeholder="FirstName" class="textbox" required></td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td><input type="text" placeholder="LastName" class="textbox" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" placeholder="Email" class="textbox" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" placeholder="Password" class="textbox" required></td>
            </tr>
            <tr>
                <td>Retype Password:</td>
                <td><input type="password" placeholder="Retype Password" class="textbox" required></td>
            </tr>
            <tr>
                <td>User Type</td>
                <td>
                    <select class='select'>
                        <option value="default" hidden>--Usertype--</option>
                        <option value="admin">Administrator</option>
                        <option value="normal">Normal user</option>
                    <select>
                </td>
            </tr>
            <tr>
                <td><input type = "submit" value="Submit" class="btn"></td>
                <td><input type = "button" value="Cancel" class="btn"></td>
            </tr>
        </table>
    </form>
</div>