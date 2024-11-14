<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel Database Connection</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div>
            <?php 
            use Illuminate\Support\Facades\DB;

            try {
                $dbName = DB::connection()->getDatabaseName();
                echo "Successfully connected to the database. The database name is: " . $dbName;
            } catch (\Exception $e) {
                echo "Failed to connect to the database. Error: " . $e->getMessage();
            }
            ?>
        </div>

        <script src="" async defer></script>
    </body>
</html>
