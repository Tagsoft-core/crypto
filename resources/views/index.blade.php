<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }} ">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<div class="section1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" data-aos="fade-up" data-aos-duration="500">
                <h1>Cryptocurrency Express Exchanger Wallet</h1>
                <h2>LTC To USDT Exchanger Invoice Admin Portal</h2> <br>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">SIGN IN</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                    @endauth
                @endif
                        <a href="{{ route('contact') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Contact Us</a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<div class="section2">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
                <h3>About Us</h3>
                <p>This is the admin portal of a private and personal USDT and LTC exchanger wallet. It is 100% legally coded. The USDT and LTC exchanger wallet is powered by real and legit deposits. For more information, or for general inquiries please see contact.</p>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<div class="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-12" data-aos="zoom-in" data-aos-duration="1000">
                <h1>What Is Litecoin (LTC)?</h1>
                <img src="{{ URL::to('/') }}/images/logofinal.png" alt="Logo">
                <p>Litecoin (LTC) is a cryptocurrency that was designed to provide fast, secure and low-cost payments by leveraging the unique properties of blockchain technology.</p>
                <p>To learn more about this project, check out our deep dive of Litecoin.</p>
                <p>The cryptocurrency was created based on the Bitcoin (BTC) protocol, but it differs in terms of the hashing algorithm used, hard cap, block transaction times and a few other factors. Litecoin has a block time of just 2.5 minutes and extremely low transaction fees, making it suitable for micro-transactions and point-of-sale payments.</p>
                <p>Litecoin was released via an open-source client on GitHub on Oct. 7, 2011, and the Litecoin Network went live five days later on Oct. 13, 2011. Since then, it has exploded in both usage and acceptance among merchants and has counted among the top ten cryptocurrencies by market capitalization for most of its existence.</p>
                <p>The cryptocurrency was created by Charlie Lee, a former Google employee, who intended Litecoin to be a “lite version of Bitcoin,” in that it features many of the same properties as Bitcoin—albeit lighter in weight.</p>
            </div>
        </div>
    </div>
</div>
<footer class="footer-container">
    <div class="container">
        <div class="min-footer">
            <div class="col-md-12">
                <p>Design &amp; Developed by <a href="https://logoin30minutes.com/home.php">Logoin30minutes.com</a></p>													</div>
        </div>
    </div>

</footer>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</html>