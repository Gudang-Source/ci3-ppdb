<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Informasi PPDB Online | Admin Login</title>
</head>
<body>

    <?php echo form_open('Auth_Controller/register'); ?>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama">
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="user">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass">
        </div>

        <div class="form-group">
            <button type="submit">Register</button>
        </div>
    <?php echo form_close(); ?>
    
</body>
</html>