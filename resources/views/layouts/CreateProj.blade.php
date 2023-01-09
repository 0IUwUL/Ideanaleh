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
        
        <div class="load">
            <div class="ring"></div>
            <span>Loading...</span>
        </div>
        <div class="page_content">
            @yield('content')
        </div>

        <script src="https://accounts.google.com/gsi/client" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
        @vite(['resources/js/app.js'])

        <script type="text/javascript">
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


            function removeTag(el, target){
                el.parentElement.remove();
                tags = tags.filter(tag => tag != target);
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

        <!-- Javascript for Tiers -->
        <script>
            document.getElementById('Tier2_toggle').onchange = function() {
                reset_tier('Tier_2', this);
            };

            document.getElementById('Tier3_toggle').onchange = function() {
                reset_tier('Tier_3', this);
            };

            function reset_tier(tier_arg, toggle_arg){
                // Disable Tier 3 when Tier 2 is disabled
                if(tier_arg === 'Tier_2'){
                    document.getElementById('Tier3_toggle').disabled = !toggle_arg.checked;
                    if(!toggle_arg.checked){
                        if(document.getElementById('Tier3_toggle').checked){
                            document.getElementById('Tier3_toggle').checked = toggle_arg.checked;
                            reset_tier('Tier_3', this);
                        }
                    }
                }

                document.getElementById(tier_arg.concat('_title')).disabled = !toggle_arg.checked;
                document.getElementById(tier_arg.concat('_amount')).disabled = !toggle_arg.checked;
                document.getElementById(tier_arg.concat('_benefits')).disabled = !toggle_arg.checked;

                document.getElementById(tier_arg.concat('_title')).required = toggle_arg.checked;
                document.getElementById(tier_arg.concat('_amount')).required = toggle_arg.checked;
                document.getElementById(tier_arg.concat('_benefits')).required = toggle_arg.checked;

                if(!toggle_arg.checked){
                    document.getElementById(tier_arg.concat('_title')).value = '';
                    document.getElementById(tier_arg.concat('_target')).value = '';
                    document.getElementById(tier_arg.concat('_benefits')).value = '';
                }
            }
        </script>

        {{-- CKEditor --}}
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.ckeditor').ckeditor();

                if ( dialogName == 'link' || dialogName == 'image' )
                {
                    // remove Upload tab
                    dialogDefinition.removeContents( 'Upload' );
                }
            });
        </script>
    </body>
</html>
