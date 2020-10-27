@extends('layout')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 50px;
            }

            .title {
                font-size: 84px;
                color: DarkSlateGray;
            }

            .links > a {
                color: DarkSlateGray;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            .content welcom{
                margin-top: 170px;
            }
            
            .card-body.customized{
                font-size: 20px;
                text-align: justify;
                margin-left: 50px;
                display: grid;
                background-color:white;
                justify-content: space-between;
                grid-template-columns: 750px auto;
                
            }
            
            .card-header.customized{
                background-color: PowderBlue;
                padding-left: 30px;
            }
            
            .card mb-3{
                color: black;
            }
            
        </style>
    </head>
    <body>
        @include('includes.navbar')
        @include('galiry')
        @section('content')
            <div class="card mb-3">
                <h3 class="card-header customized">HOW YOUR WEIGHT AFFECTS YOUR RUNNING<br>PERFORMANCE</h3>
                <div class="card-body customized">
                    <div>
                        <p class="card-subtitle">Although the frequency and variety of
                            your training sessions are key factors in your running progress, other
                            factors should also be taken into consideration for the more exacting runner.
                            In order to attain an ambitious target, let's now take a look at the role
                            played by your body weight.</p>
                    </div>
                    <div>    
                        <img src="/images/body2.jpg" alt="Fourth slide" style= "height: 200px; width:300px;">
                    </div>
                </div>
                
                <h3 class="card-header customized"><i>HOW SHOULD YOU WEIGH YOURSELF?</i></h3>
                <div class="card-body customized">
                    <div>
                        <p class="card-subtitle">You surely already know
                            thatthere is no point in weighing yourself every 5 minutes!
                            You should weigh yourself when you get up in the morning, before
                            breakfast and after having urinated. This should be done several
                            mornings in succession in order to get a reliable average reading.</p>
                        <br>
                        <p class="card-subtitle">What's more, weighing yourself just
                            after a run is not advisable:you will probably not want the unexpected
                            surprise of a weight gain when you have rehydrated yourself! Indeed,
                            a run can result in a moderate loss of water of between 0.5 and 1 L per hour,
                            whereas this fluid loss can exceed 2 L depending on the intensity
                            of effort and the external temperature.</p>
                        <br>
                        <p class="card-subtitle">Another factor that can result
                            in a temporary weight loss:energy consumption. Your body draws on
                            its glycogen reserves during any exercise that requires endurance.
                            This results in a slight loss of weight that is equally temporary
                            because the weight is regained as soon as your reserves are built up again…</p>
                    </div>
                    <div>    
                        <img src="/images/body3.jpg" alt="Fourth slide" style= "height: 250px; width:300px; margin-top:50px;">
                    </div>
                </div>
                
                <h3 class="card-header customized"><i>HOW SHOULD YOU MEASURE YOUR FITNESS WEIGHT?</i></h3>
                <div class="card-body customized">
                    <div>
                        <p class="card-subtitle">The well-known body mass index (BMI)
                            can give you an initial indication for estimating your fitness weight.
                            Using a calculation that combines your height and your weight, you can
                            work out whether your body shape matches the standard or
                            if you are overweight.</p>
                        <br>
                        <p class="card-subtitle">The calculation is as follows:
                            weight in kg/(height in metres squared).Example:72/(1.81x1.81)= 21.98. If,
                            as is the case here, the result lies between 18.5 and 25, your BMI is
                            considered to be "normal".If it exceeds 25, you are overweight and, if it
                            is below 18.5, you are underweight.</p>
                        <br>
                        <p class="card-subtitle">If you are new to running, this measure can
                            be helpful to motivate you to train and get back in physical shape. This
                            being said, in order to obtain a more reliable and precise measurement,
                            you need to know the proportion of fat and muscle mass of your body by consulting
                            a specialist.</p>
                    </div>
                    <div>    
                        <img src="/images/body4.jpg" alt="Fourth slide" style= "height: 250px; width:250px; margin-top:50px;">
                    </div>
                </div>
                
                <h3 class="card-header customized"><i>WHY DOES YOUR WEIGHT AFFECT YOUR CAPACITY TO EXERCISE?</i></h3>
                <div class="card-body customized">
                    <div>
                        <p class="card-subtitle">When running, surplus weight
                            (fat mass to be more precise) can have several negative repercussions
                            on the body: increase in heart rate and hence oxygen consumption,
                            increase in body temperature during exercise, increase in energy
                            expenditure as well as an increase in the pressure exerted on
                            the bones and joints.</p>
                        <br>
                        <p class="card-subtitle">Weight is a key factor in defining the
                            oxygen consumption of sportsmen and women, particularly when it comes
                            to identifying the threshold at which the maximum volume of oxygen consumed
                            is attained (VO²max). For a runner, this maximum value is associated with a
                            specific speed:the Maximum Aerobic Speed. Developing the MAS in training
                            therefore leads to an increase of the running speed at which your volume of
                            oxygen is maximised.Reducing fat mass reduces your need for oxygen and reduces
                            the energy expenditure associated with your running stride, which therefore
                            leads to an improvement in this speed.</p>
                        <br>
                        <p class="card-subtitle">Indeed, an American survey by the National
                            Runner's Health Study on 4700 users showed that a 2 kg change in weight can
                            lead to a difference of almost 1 minute on a 10 km run!</p>
                    </div>
                    <div>    
                        <img src="/images/body1.jpg" alt="Fourth slide" style= "height: 300px; width:300px; margin-top:50px;">
                    </div>
                </div>
                    <div>    
                        <img src="/images/footer_image.jpg" alt="Fourth slide" style= "height: 400px; width: 100%; margin-bottom:-18px; margin-left: -5px;">
                    </div>
            </div>
            @include('footer')
        @endsection
        
    </body>
</html>
