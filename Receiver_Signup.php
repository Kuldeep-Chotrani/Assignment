<?php session_start(); ?>
<?php include 'header_file.php'; ?>
<?php include 'Custom_Menu_file.php'; ?>
<?php include 'sidebar_file.php';  ?>
        <h1> Sign Up Form For Receivers</h1>
            <form method="post" name="Receiver_Signup " action="Receiver_Signup_Results.php">
              <table>
              <p>
                <tr><td>Email</td><td><input type="text" name="Receiver_email" value=""/></td></tr>
                <tr><td>Full-Name</td><td><input type="text" name="Receiver_FullName" value=""/></td></tr>
                <tr><td>Age</td><td><input type="numeric" name="Receiver_Age" value=""/></td></tr>
                <tr><td>Contact</td><td><input type="numeric" name="Receiver_Contact" value=""/></td></tr>
                <tr><td>Address</td><td><input type="text" name="Receiver_Address" value=""/></td></tr>
                <tr>
                  <td>BloodGroup</td>
                  <td>
                    <select id="id" name="Receiver_Blood_Group">
                    <option value=" ">Select your Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="B+">B+</option>
                    <option value="B+">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    </select>
                  </td>
                </tr>
                <tr><td>Password</td><td><input type="text" name="Receiver_Password" value=""/></td></tr>
                <tr><td></td><td><input type="submit" name="submit_receiver_signup" value="Finish"/></td></tr>
              </p>
              </table>
            </form>

<?php include 'footer_file.php'; ?>