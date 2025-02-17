<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Published</title>

    <link rel="preconnect" href="https://rsms.me/">
    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">

    <style>
        body {
            text-align: center;
            font-family: 'Inter', sans-serif;
        }

        .kikir {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .linknya {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 0.25rem;
            height: 2.5rem;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            background-color: #374151;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            width: 9rem;
            padding: 0 1rem;
            text-decoration: none;
        }

        .headernya {
            padding: 1rem;
        }

        .footernya {
            color: rgb(156 163 175);
            font-size: 14px;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>

<body>
    <h1 class="mx-auto headernya">Store Published</h1>

    <p>The store you are registered ({{ $store->name }}) has been published.</p>

    <div class="kikir">
        <a class="linknya" href="{{ route('stores.show', $store) }}"> Lihat Tokomu!
        </a>
    </div>

    <p class="footernya">Thanks,<br>{{ config('app.name') }}</p>
</body>

</html>
