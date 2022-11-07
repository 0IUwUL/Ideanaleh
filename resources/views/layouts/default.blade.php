<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ideanaleh</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>
        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased">

        @yield('content')

        <script src="https://accounts.google.com/gsi/client" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        @vite(['resources/js/app.js'])
{{-- 
        <script>
            
            let tags = [];
            const ul = document.querySelector("#listTags");

            function remove (element, tag){
                let index = tags.indexOf(tag);
                tags = [...tags.slice(0, index), ...tags.slice(index+1)];
                element.parentElement.remove();
            }
            function createTag(){
                ul.querySelectorAll("li").forEach(li => li.remove());
                tags.slice().reverse().forEach(tag=>{
                    // removing all li tags before adding so that there will be no duplicate tags
                    
                    let iTag = `<li>${tag} <i class="fa-solid fa-x" role="button" onclick="remove(this, '${tag}')"></i></li>`;
                    ul.insertAdjacentHTML("afterbegin", iTag); //inserting li inside ul tag
                });
            }

            function addTag(e){

                if (e.key == "Enter"){
                    let tag = e.target.value.replace(/\s+/g, ' '); //removes unwanted spaces
                    
                    if (tag.length > 1 && !tags.includes(tag)){ //  if tag length is greater one and exist
                        tag.split(',').forEach(tag=>{   //splitting tags
                            tags.push(tag);               //adding each tag inside array
                            createTag();
                        });
                    }
                    console.log(tags);
                    e.target.value = "";
                }
            }
            $("#tags").on("keyup", addTag);
        </script> --}}
    </body>
</html>
