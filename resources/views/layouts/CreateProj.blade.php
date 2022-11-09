<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ideanaleh</title>

        <!-- Fonts -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>
        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased">

        @yield('content')

        <script src="https://accounts.google.com/gsi/client" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        @vite(['resources/js/app.js'])

        <script>
            // Tags js
            const input_tags = document.querySelector(".tags input")
            var max_tags = 6;
            document.querySelector('.max-tags').innerText = max_tags


            let tags = [];
            document.querySelector(".current-tag").innerText = tags.length;

            function clearTags(){
                document.querySelectorAll('.tag').forEach(tag => tag.remove());
                tags = []; 
                countTags();
            }

            function countTags(){
                input_tags.focus();
                document.querySelector(".current-tag").innerText = tags.length;
            }

            /**
             * The problem here is that when you remove a tag the 'name' of the 'input' infield is not updated
             * 
             * Say i have 3 tags namely Nice, One, Mark,... therefore the are also 3 hidden input fields with the names
             * TagName1, TagName2, TagName3, ... However, if I decided to delete the tag named 'One'...
             * 
             * Expected: TagName1, TagName2
             * Output: TagName1, TagName3
             * 
             * For now I will leave it as is -RamonDev
             */
            function removeTag(el, target){
                el.parentElement.remove();
                tags = tags.filter(tag => tag != target);
                console.log(tags);
                countTags();
            }

            $("#clear_tags").on("click", clearTags);
            
            input_tags.addEventListener('keyup', (e)=>{
                if (e.key == "Enter" || e.key == ","){
                    
                    let tag_value = input_tags.value.replace( /\s+/g, ' ');
                    if (tag_value.length > 1 && tags.length <= max_tags && !tags.includes(tag_value)){
                        tags.push(...tag_value.split(',').filter(new_tag=>new_tag != ''));

                        let extra_tags = tags.length - max_tags;
                        for (let i = 0; i < extra_tags; i++){
                            tags.pop()
                        }

                        tags = [...new Set(tags)];
                        createTag();
                    }
                    input_tags.value = '';
                }
                countTags();
            });

            function createTag(){
                document.querySelectorAll('.tag').forEach(tag => tag.remove());
                for (tag of tags){
                    let span_tag = `<span class = "tag">${tag} <input type="hidden" name="Tags[]" value="${tag}"> <span class="remove-tag" onclick = "removeTag(this, '${tag}')">&times;</span></span> `;
                    input_tags.insertAdjacentHTML('beforebegin', span_tag);
                }
            }
        </script>
    </body>
</html>
