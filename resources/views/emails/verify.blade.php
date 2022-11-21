<!DOCTYPE>
<html lang="en" xml:lang="en">
    <title>Ideanaleh</title>
    <body style = "width: 50rem; margin: auto">
        <div style = "color: white; margin-top: 10px">
            <div style = "background-color: #1f4260; border-radius: 10px;">
                <div style = "padding: 1rem; display: flex; justify-content: center;">
                    <h1 style = "font-family: 'Brush Script MT'; font-size:3rem">
                        Ideanaleh 
                    </h1>
                </div>
            </div>
            <hr>
            <div style = "display: flex; justify-content: center; margin-top: 2rem;">
                <div>
                    <div style = "color: black">
                        <p style = "font-size: 2rem"> Hello , {{$details['header']}}</p> 
                    </div>
                    <div style = "color: black">
                        <p>Here is your verification code: </p>
                    </div>
                    <div style = "letter-spacing: 3em; text-align: center; text-indent: 3em; color: black">
                            <p style= "font-size: 50px">{{$details['code']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>