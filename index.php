
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/output.css">
    <title>Rick's and Morty's</title>
</head>
<body>

    <div class="w-full flex flex-col justify-center items-center mt-6 lg:mt-8">
        <h1 class="text-2xl lg:text-4xl pallete">Welcome to Rick's and Morty's</h1>
    </div>

    <div class="w-full flex flex-col justify-center items-center">

        <form method="post">
    
            <input type="text" name="name" placeholder="Name" class="lg:w-1/3 p-1 pl-3">

                <select name="status" class="flex-1 text-center">
                    <option value="">Select a status</option>
                    <option value="Alive">Alive</option>
                    <option value="Dead">Dead</option>
                    <option value="Unknown">Unknown</option>
                </select>

                <select name="specie"class="flex-1 text-center">
                    <option value="">Select a specie</option>
                    <option value="Human">Human</option>
                    <option value="Alien">Alien</option>
                    <option value="Animal">Animal</option>
                    <option value="Cronenberg">Cronenberg</option>
                    <option value="Disease">Disease</option>
                    <option value="Humanoid">Humanoid</option>
                    <option value="Mythological+Creature">Mythological Creature</option>
                    <option value="Poopybutthole">Poopybutthole</option>
                    <option value="Robot">Robot</option>
                    <option value="Unknown">Unknown</option>
                </select>

                <select name="gender" class="flex-1 text-center">
                    <option value="">Select a gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Genderless">Genderless</option>
                    <option value="Unknown">Unknown</option>
                </select>

            <button type="submit" class="lg:w-1/8 shadow-md cursor-pointer">Search</button>
        </form>

    <div class="w-full md:w-11/12 lg:w-10/12 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 p-10 pallete">

<?php
#API URL
$api_url = "https://rickandmortyapi.com/api/character/"; 
$mutable_url = $api_url . "?page=1";

#GETS
$name = $_POST['name'] ?? null;
$status = $_POST['status'] ?? null;
$specie = $_POST['specie'] ?? null;
$gender = $_POST['gender'] ?? null;

#FILTERS
if(!empty($name)):   $mutable_url .= "&name=".$name; endif;
if(!empty($status)): $mutable_url .= "&status=".$status; endif;
if(!empty($specie)): $mutable_url .= "&species=".$specie; endif;
if(!empty($gender)): $mutable_url .= "&gender=".$gender; endif;

#GET API DATA
$response = file_get_contents($mutable_url);

if ($response === FALSE) {
    echo "Error fetching data from API.";
} else {
    $data = json_decode($response); 
}

#SHOW DATA
foreach($data->results as $character){
    echo '
    <div class="card">
        <img src='.$character->image.'>
        <h3>'.$character->name.' </h3>
        <p>'.$character->species.' | '.$character->status.'</p>
    </div>
    ';
}

$next_page = $data->info->next;

?>

    </div>
</div>

</body>
</html>