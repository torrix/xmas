<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xmas Lights</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .rainbow {
            background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2b1de8, #dd00f3, #dd00f3);
            background-size: 1800% 1800%;

            -webkit-animation: rainbow 5s ease infinite;
            -o-animation: rainbow 5s ease infinite;
            animation: rainbow 5s ease infinite;
        }

        @-webkit-keyframes rainbow {
            0% {
                background-position: 0 82%
            }
            50% {
                background-position: 100% 19%
            }
            100% {
                background-position: 0 82%
            }
        }

        @-moz-keyframes rainbow {
            0% {
                background-position: 0 82%
            }
            50% {
                background-position: 100% 19%
            }
            100% {
                background-position: 0 82%
            }
        }

        @-o-keyframes rainbow {
            0% {
                background-position: 0 82%
            }
            50% {
                background-position: 100% 19%
            }
            100% {
                background-position: 0 82%
            }
        }

        @keyframes rainbow {
            0% {
                background-position: 0 82%
            }
            50% {
                background-position: 100% 19%
            }
            100% {
                background-position: 0 82%
            }
        }

        .active {
            background: white;
            color: #222;
        }
        button.rounded-lg {
            font-family: 'Short Stack', sans-serif;
            -webkit-text-stroke: 1px black;
            text-shadow:
                    2px 2px 0 #000,
                    -1px -1px 0 #000,
                    1px -1px 0 #000,
                    -1px 1px 0 #000,
                    1px 1px 0 #000;
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Short+Stack' rel='stylesheet' type='text/css'>
</head>
<body class="bg-gray-900">
<!--<div class="flex flex-center mt-3">
    <div class="inline-flex mx-auto space-x-3">
        <button class="bg-gray-600 inline-flex items-center transition-colors duration-300 ease-in focus:outline-none rounded-full px-4 py-2 active"
                id="wipe" onclick="wipe()">
            <span>Wipe Mode</span>
        </button>
        <button class="bg-gray-600 inline-flex items-center transition-colors duration-300 ease-in focus:outline-none rounded-full px-4 py-2"
                id="flash" onclick="flash()">
            <span>Flash Mode</span>
        </button>
    </div>
</div>-->

<ul class="flex flex-col text-white text-3xl text-center space-y-3 p-3 md:w-1/2 mx-auto">
    <li class="flex space-x-3">
        <button class="rounded-lg p-3 w-full bg-red-600" onclick="go('red')">Red</button>
    </li>
    <li class="flex space-x-3">
        <button class="rounded-lg p-3 w-full bg-yellow-300" onclick="go('yellow')">Yellow</button>
    </li>
    <li class="flex space-x-3">
        <button class="rounded-lg p-3 w-full bg-green-600" onclick="go('green')">Green</button>
    </li>
    <li class="flex space-x-3">
        <button class="rounded-lg p-3 w-full bg-blue-600" onclick="go('blue')">Blue</button>
    </li>
    <li class="flex space-x-3">
        <button class="rounded-lg p-3 w-full bg-purple-600" onclick="go('purple')">Purple</button>
    </li>
    <li class="flex space-x-3">
        <button class="rounded-lg p-3 w-full bg-white" onclick="go('white')">White</button>
    </li>
    <!--<li class="flex space-x-3">
        <button class="rounded-lg p-3 w-full rainbow" onclick="rainbow()">Rainbow</button>
    </li>-->
</ul>
<p class="text-center text-white px-3 pb-5">
    Merry Christmas from<br>
    <a href="https://www.facebook.com/TorrisholmeChildminder/" target="_blank">Sylvia Pearson - Torrisholme Childminder</a><br>
    and <a href="https://torrix.uk/" target="_blank">Torrix Web Development</a>
</p>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.mode = 'wipe';

    function wipe() {
        document.getElementById('flash').classList.remove('active');
        document.getElementById('wipe').classList.add('active');
        window.mode = 'wipe';
    }

    function flash() {
        document.getElementById('wipe').classList.remove('active');
        document.getElementById('flash').classList.add('active');
        window.mode = 'flash';
    }

    function go(colour) {
        if (window.mode === 'wipe') {
            axios.get('/wipe/' + colour);
        } else {
            axios.get('/flash/' + colour);
        }
    }

    function rainbow() {
        axios.get('/rainbow/' + window.mode);
    }
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-03NTWW9G5W"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-03NTWW9G5W');
</script>
</body>
</html>
