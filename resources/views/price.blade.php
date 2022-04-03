<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Цены</title>
  <link rel="shortcut icon" href="images/Logo.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,600;0,700;1,500&family=Open+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/style.min.css" />
</head>

<body>
  <header class="header">
    <div class="header__top">
      <div class="header__top-name">
        <img class="menu__img" src="./images/Logo.png" alt="logo" />
      </div>
{{--      <nav class="menu">--}}
{{--        <ul class="menu__list">--}}
{{--          <li class="menu__list-item">--}}
{{--            <a class="menu__link" href="index.blade.php#serviceid"> Услуги </a>--}}
{{--          </li>--}}
{{--          <li class="menu__list-item">--}}
{{--            <a class="menu__link" href="index.blade.php#aboutid"> О нас </a>--}}
{{--          </li>--}}
{{--          <li class="menu__list-item">--}}
{{--            <a class="menu__link" href="index.blade.php#worksid"> Наши работы </a>--}}
{{--          </li>--}}
{{--          <li class="menu__list-item">--}}
{{--            <a class="menu__link" href="index.blade.php#priceid"> Цены </a>--}}
{{--          </li>--}}
{{--          <li class="menu__list-item">--}}
{{--            <a class="menu__link" href="index.blade.php#contactid"> Контакты </a>--}}
{{--          </li>--}}
{{--        </ul>--}}
{{--      </nav>--}}
    </div>
  </header>

  <main class="main">
    <section class="prices">
      <button class="back__btn"><a class="back__link" href="{{ route('index') }}"><img class="back__img"
                                                                                  src="./images/back_btn.svg" alt="back">Назад</a></button>
      <div class="container">
        <h1 class="prices__title" id="price">Цены</h1>
        <p class="prices__text">Наша команда постоянно обучается, повышает квалификацию и старается быть с вами на одной
          волне. </p>
        <p class="prices__text">Мастера понимают с полуслова, знают подход ко всем рукам, заработали положительные
          отзывы и доверие клиентов. Они воплотят ваши задумки.</p>
        <p class="prices__text">От нас вы уйдете с качественным маникюром и безупречным дизайном. Выбирайте мастера и
          записывайтесь.</p>
      </div>
    </section>

    @foreach($employees as $key => $employee)

        @if($key % 2 === 0)
          <section class="master">
      <div class="container">

        <h1 class="master__title">{{$employee[0]->employeeCategorie->name}}</h1>
        <p class="master__text"> {{$employee[0]->employeeCategorie->description}} </p>
              <div class="master__goods">
                  <div class="top__manicure">
                      @foreach($employee as $k => $value)
{{--                      <h2 class="top__manicure-title">Маникюр</h2>--}}
                      <ul class="top__manicure-items">
                          @if($k % 2 === 0)
                          <li class="top__item">{{ $value->service->name }} — <span>{{ $value->price }}</span> грн
                          </li>
                          @endif
                              @if($k % 2 !== 0)
                          <li class="top__item right">{{ $value->service->name }} — <span>{{ $value->price }}</span> грн
                          @endif
                      </ul>
                      @endforeach
                  </div>
              </div>
        </div>
    </section>

        @endif
    @if($key % 2 !== 0)
    <section class="midl">
      <div class="container">
        <h1 class="midl__title">{{$employee[0]->employeeCategorie->name}}</h1>
        <p class="midl__text"> {{$employee[0]->employeeCategorie->description}} </p>
        <div class="midl__goods">
          <div class="midl__manicure">
{{--            <h2 class="midl__manicure-title">Маникюр</h2>--}}
            <ul class="midl__manicure-items">
                @foreach($employee as $k => $value)
                @if($k % 2 === 0)
              <li class="midl__item">{{ $value->service->name }} — <span>250</span> грн
              </li>
                @endif
                @if($k % 2 != 0)
              <li class="midl__item right">{{ $value->service->name }} — <span>420</span> грн
              </li>
                    @endif
                @endforeach
            </ul>

          </div>
        </div>
        </div>
    </section>
    @endif
      @endforeach
  </main>


  <footer class="footer">
    <div class="footer__bottom">
      <p class="footer__bottom-text full">
        © 2022 Irina Shkrytiuk Nail Studio Все права защищены
      </p>
    </div>
  </footer>

  <script src="js/main.min.js"></script>
  <script class="test" src="//w682985.yclients.com/widgetJS"></script>

  <!-- <div id="button-up">
      <i class="fa fa-chevron-up"></i>
    </div> -->
</body>

</html>
