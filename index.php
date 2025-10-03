
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body class="bg-gray-800 text-amber-400">

    <div class="w-full flex flex-col justify-center items-center">

        <form method="post" 
          class="w-11/12 lg:w-6/8 flex flex-col md:flex-row justify-center mt-5 gap-4
          bg-gray-500/30 backdrop-blur-md rounded-xl shadow-md px-10 py-8">
    
            <input type="text" name="name" placeholder="Name" class="lg:w-1/3 p-1 pl-3 bg-gray-500/30 rounded-xl shadow-md outline-none focus:ring-2 focus:ring-amber-400">

                <select name="status" class="p-1 bg-gray-500/30 rounded-xl shadow-md flex-1 text-center outline-none focus:ring-2 focus:ring-amber-400">
                    <option value="">Select a status</option>
                    <option value="Alive">Alive</option>
                    <option value="Dead">Dead</option>
                    <option value="Unknown">Unknown</option>
                </select>

                <select name="specie" class="p-1 bg-gray-500/30 rounded-xl shadow-md flex-1 text-center outline-none focus:ring-2 focus:ring-amber-400">
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

                <select name="gender" class="p-1 bg-gray-500/30 rounded-xl shadow-md flex-1 text-center outline-none focus:ring-2 focus:ring-amber-400">
                    <option value="">Select a gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Genderless">Genderless</option>
                    <option value="Unknown">Unknown</option>
                </select>

            <button type="submit" class="lg:w-1/8 p-1 bg-gray-500/30 rounded-xl shadow-md cursor-pointer outline-none focus:ring-2 focus:ring-amber-400">Search</button>
        </form>

    <div class="w-full md:w-11/12 lg:w-10/12 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 p-10">

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
    <div class="flex flex-col justify-center items-center border-2 rounded-2xl py-7 px-3">
        <img src='.$character->image.' class="border rounded-xl">
        <h3 class="text-xl font-semibold">'.$character->name.' </h3>
        <p class="text-md">'.$character->species.' | '.$character->status.'</p>
    </div>
    ';
}


?>


    </div>
</div>

</body>
</html>