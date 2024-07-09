@extends('livewire.components.main')
@section('content')
    <!-- Appbar -->
    <div class="fixed-top position-absolute">
        <div class="appbar-area sticky-black">
            <div class="container overflow-hidden">
                <div class="video-sik">
                    <video autoplay muted loop>
                        <source src="assets/images/sys-soocien/soocien-video1.mp4" type="video/mp4" />
                        Seu navegador não suporta a tag de vídeo.
                    </video>
                </div>
                <div class="appbar-container navbar-pg">
                    <div class="appbar-item appbar-actions zindex-1">
                        <div class="appbar-action-item">
                            <a href="#" class="appbar-action-bar" data-bs-toggle="modal"
                                data-bs-target="#sidebarDrawer"><i class="flaticon-menu"></i></a>
                        </div>
                    </div>
                    <div class="appbar-item appbar-brand me-auto">
                        <a href="index.html">
                            <img style="width: 180px" src="assets/images/sys-soocien/soocien-logo2.svg" alt="logo"
                                class="main-logo" />
                            <img src="assets/images/sys-soocien/soocien-logo2.svg" alt="logo" class="hover-logo" />
                        </a>
                    </div>
                    <div class="appbar-item appbar-options">
                        <div class="appbar-option-item appbar-option-notification">
                            <a href="{{ route('notification.get') }}"><i class="flaticon-bell"></i></a>
                            @include('livewire.components.notification')
                        </div>
                        @php
                            if (empty(Auth::guard('client')->user()->avatar)) {
                                $avatar = '/assets/images/sys-soocien/pessoa.svg';
                            } else {
                                $avatar = Auth::guard('client')->user()->avatar;
                            }
                        @endphp
                        <div class="appbar-option-item appbar-option-profile">
                            <a href="{{ route('profile.get') }}"><img src="{{ $avatar }}" alt="profile"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appbar -->

    <!-- Body-content -->
    <div class="body-content body-content-lg">
        <!-- "body-content-lg" add this class if any cards inside this div has "section-to-header" class -->
        <div class="container mt-5">
            <!-- Add-card -->
            <div class="add-card section-to-header mb-30">
                <div class="add-card-inner">
                    <div class="add-card-item add-card-info">
                        <p>Saldo Total</p>
                        <h3>R$ {{ number_format(Auth::guard('client')->user()->balance, 2, ',', '.') }}</h3>
                    </div>
                    <div class="add-card-item add-balance" data-bs-toggle="modal" data-bs-target="#addBalance">
                        <a href="#"><i class="flaticon-plus"></i></a>
                        <p>Depositar Saldo</p>
                    </div>
                </div>
            </div>
            <!-- Add-card -->
            <!-- Option-section -->
            <div class="option-section mb-15">
                <div class="row gx-3">
                    <div class="col pb-15">
                        <div class="option-card option-card-violet">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#p2p">
                                <div class="option-card-icon">
                                    <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"
                                        width="29" height="29">
                                        <defs>
                                            <image width="25" height="25" id="img1"
                                                href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZAQMAAAD+JxcgAAAAAXNSR0IB2cksfwAAAANQTFRF////p8QbyAAAAA5JREFUeJxjZAACxgEiAAbWABpIKeldAAAAAElFTkSuQmCC" />
                                            <image width="64" height="64" id="img2"
                                                href="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNjQgNjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgaWQ9Ikljb24iPjxwYXRoIGQ9Im0xOCA0NmgtN2E3LjAwOCA3LjAwOCAwIDAgMCAtNyA3djNhNCA0IDAgMCAwIDQgNGgxM2E0IDQgMCAwIDAgNC00di0zYTcuMDA4IDcuMDA4IDAgMCAwIC03LTd6bTUgMTBhMiAyIDAgMCAxIC0yIDJoLTEzYTIgMiAwIDAgMSAtMi0ydi0zYTUuMDA2IDUuMDA2IDAgMCAxIDUtNWg3YTUuMDA2IDUuMDA2IDAgMCAxIDUgNXoiLz48cGF0aCBkPSJtMTQuNSA0NGE3IDcgMCAxIDAgLTctNyA3LjAwOCA3LjAwOCAwIDAgMCA3IDd6bTAtMTJhNSA1IDAgMSAxIC01IDUgNS4wMDYgNS4wMDYgMCAwIDEgNS01eiIvPjxwYXRoIGQ9Im01MyA0NmgtN2E3LjAwOCA3LjAwOCAwIDAgMCAtNyA3djNhNCA0IDAgMCAwIDQgNGgxM2E0IDQgMCAwIDAgNC00di0zYTcuMDA4IDcuMDA4IDAgMCAwIC03LTd6bTUgMTBhMiAyIDAgMCAxIC0yIDJoLTEzYTIgMiAwIDAgMSAtMi0ydi0zYTUuMDA2IDUuMDA2IDAgMCAxIDUtNWg3YTUuMDA2IDUuMDA2IDAgMCAxIDUgNXoiLz48cGF0aCBkPSJtNDIuNSAzN2E3IDcgMCAxIDAgNy03IDcuMDA4IDcuMDA4IDAgMCAwIC03IDd6bTctNWE1IDUgMCAxIDEgLTUgNSA1LjAwNiA1LjAwNiAwIDAgMSA1LTV6Ii8+PHBhdGggZD0ibTM4IDQ1aC05LjU0NmwxLjMzMi0xLjMzM2ExIDEgMCAwIDAgLTEuNDE0LTEuNDE0bC0zLjA3OSAzLjA4YTEgMSAwIDAgMCAwIDEuNDE0bDMgM2ExIDEgMCAwIDAgMS40MTQtMS40MTRsLTEuMzMyLTEuMzMzaDkuNjI1YTEgMSAwIDAgMCAwLTJ6Ii8+PHBhdGggZD0ibTM0LjIxNCA0MS43NDdhMSAxIDAgMCAwIDEuNDE0IDBsMy4wNzktMy4wOGExIDEgMCAwIDAgMC0xLjQxNGwtMy0zYTEgMSAwIDAgMCAtMS40MTQgMS40MTRsMS4zMzIgMS4zMzNoLTkuNjI1YTEgMSAwIDAgMCAwIDJoOS41NDZsLTEuMzMyIDEuMzMzYTEgMSAwIDAgMCAwIDEuNDE0eiIvPjxwYXRoIGQ9Im0zMiAzMmExNCAxNCAwIDEgMCAtMTQtMTQgMTQuMDE1IDE0LjAxNSAwIDAgMCAxNCAxNHptMC0yNmExMiAxMiAwIDEgMSAtMTIgMTIgMTIuMDEzIDEyLjAxMyAwIDAgMSAxMi0xMnoiLz48cGF0aCBkPSJtMzIgMjMuNGEyLjIgMi4yIDAgMCAxIC0yLjItMi4yIDEgMSAwIDEgMCAtMiAwIDQuMiA0LjIgMCAwIDAgMy4yIDQuMDY1di43MWExIDEgMCAwIDAgMiAwdi0uNzFhNC4xOTUgNC4xOTUgMCAwIDAgLTEtOC4yNjUgMi4yIDIuMiAwIDEgMSAyLjItMi4yIDEgMSAwIDAgMCAyIDAgNC4yIDQuMiAwIDAgMCAtMy4yLTQuMDc1di0uNzVhMSAxIDAgMCAwIC0yIDB2Ljc1YTQuMTk1IDQuMTk1IDAgMCAwIDEgOC4yNzUgMi4yIDIuMiAwIDAgMSAwIDQuNHoiLz48L2c+PC9zdmc+" />
                                        </defs>
                                        <style></style>
                                        <use style="display: none" href="#img1" x="0" y="0" />
                                        <use href="#img2" transform="matrix(.391,0,0,.391,0,0)" />
                                    </svg>
                                </div>
                                <p>P2P</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15">
                        <div class="option-card option-card-yellow">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#sendMoney">
                                <div class="option-card-icon">
                                    <img src="assets/images/sys-soocien/area-pix.svg" alt="user" />
                                </div>
                                <p>Área PIX</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15">
                        <div class="option-card option-card-blue">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#makeLink">
                                <div class="option-card-icon">
                                    <img src="assets/images/sys-soocien/criar-link.svg" alt="user" />
                                </div>
                                <p>Criar Link</p>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15">
                        <div class="option-card option-card-red">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exchange">
                                <div class="option-card-icon">
                                    <img src="assets/images/sys-soocien/converter.svg" alt="user" />
                                </div>
                                <p>Coverter</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Option-section -->
            <div>
                <h5 style="color: black">Carteira</h5>
            </div>
            <!-- Feature-section -->
            <div class="feature-section mb-15">
                <div class="row gx-3">
                    <div class="col col-sm-6 pb-15">
                        <div class="feature-card">
                            <div class="feature-card-thumb">
                                <svg width="64px" height="64px" viewBox="-4.8 -4.8 57.60 57.60"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0">
                                        <rect x="-4.8" y="-4.8" width="57.60" height="57.60" rx="0"
                                            fill="#fff" strokewidth="0" />
                                    </g>

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier">
                                        <title>input</title>
                                        <g id="Layer_2" data-name="Layer 2">
                                            <g id="invisible_box" data-name="invisible box">
                                                <rect width="48" height="48" fill="none" />
                                            </g>
                                            <g id="icons_Q2" data-name="icons Q2">
                                                <path
                                                    d="M8,9.7a2,2,0,0,1,.6-1.4A21.6,21.6,0,0,1,24,2a22,22,0,0,1,0,44A21.6,21.6,0,0,1,8.6,39.7a2,2,0,1,1,2.8-2.8,18,18,0,1,0,0-25.8,1.9,1.9,0,0,1-2.8,0A2,2,0,0,1,8,9.7Z" />
                                                <path
                                                    d="M33.4,22.6l-7.9-8a2.1,2.1,0,0,0-2.7-.2,1.9,1.9,0,0,0-.2,3L27.2,22H4a2,2,0,0,0-2,2H2a2,2,0,0,0,2,2H27.2l-4.6,4.6a1.9,1.9,0,0,0,.2,3,2.1,2.1,0,0,0,2.7-.2l7.9-8A1.9,1.9,0,0,0,33.4,22.6Z" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="feature-card-details">
                                <p>Valor BRL</p>
                                <h3>R$ {{ number_format(Auth::guard('client')->user()->balance, 2, ',', '.') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-6 pb-15">
                        <div class="feature-card">
                            <div class="feature-card-thumb">
                                <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px"
                                    viewBox="-18.2 -18.2 218.43 218.43" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier1" stroke-width="0">
                                        <rect x="-18.2" y="-18.2" width="218.43" height="218.43" rx="0"
                                            fill="#fff" strokewidth="0" />
                                    </g>

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier0">
                                        <g>
                                            <g>
                                                <path
                                                    d="M31.859,91.005c0-29.508,21.753-53.977,50.061-58.382v12.881l36.396-22.755L81.913,0v14.222 c-38.388,4.545-68.266,37.218-68.266,76.784c0,27.809,14.789,52.153,36.849,65.778l17.853-11.141 C46.939,136.717,31.859,115.602,31.859,91.005z" />
                                                <path
                                                    d="M131.525,25.237l-17.851,11.157c21.418,8.892,36.499,30.012,36.499,54.611c0,29.532-21.749,53.985-50.058,58.396v-12.887 l-36.402,22.764l36.402,22.747v-14.244c38.386-4.53,68.263-37.199,68.263-76.776C168.379,63.207,153.59,38.865,131.525,25.237z" />
                                                <path
                                                    d="M95.401,130.802v-9.942c11.204-1.953,17.362-9.362,17.362-18.041c0-8.777-4.679-14.134-16.275-18.241 c-8.298-3.121-11.716-5.166-11.716-8.383c0-2.733,2.045-5.464,8.395-5.464c7.015,0,11.496,2.235,14.041,3.319l2.819-11.023 c-3.203-1.557-7.602-2.919-14.131-3.208v-8.586h-9.562v9.261c-10.42,2.041-16.473,8.777-16.473,17.355 c0,9.458,7.123,14.344,17.568,17.846c7.204,2.441,10.323,4.782,10.323,8.493c0,3.896-3.796,6.041-9.354,6.041 c-6.336,0-12.093-2.048-16.183-4.29l-2.925,11.411c3.693,2.148,10.041,3.899,16.569,4.189v9.264H95.401z" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="feature-card-details">
                                <p>Valor USDT</p>
                                <h3>$ {{ number_format(Auth::guard('client')->user()->balance_usdt, 2, ',', '.') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-6 pb-15">
                        <div class="feature-card">
                            <div class="feature-card-thumb">
                                <svg fill="#000000" width="64px" height="64px" viewBox="-2.4 -2.4 28.80 28.80"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier4" stroke-width="0">
                                        <rect x="-2.4" y="-2.4" width="28.80" height="28.80" rx="0"
                                            fill="#fff" strokewidth="0" />
                                    </g>

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                        stroke="#CCCCCC" stroke-width="0.144" />

                                    <g id="SVGRepo_iconCarrier3">
                                        <path
                                            d="M20,3H4A3,3,0,0,0,1,6V18a3,3,0,0,0,3,3H20a3,3,0,0,0,3-3V6A3,3,0,0,0,20,3Zm1,15a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V6A1,1,0,0,1,4,5H20a1,1,0,0,1,1,1Zm-4.293-6.707a1,1,0,1,1-1.414,1.414L13,10.414V16a1,1,0,0,1-2,0V10.414L8.707,12.707a1,1,0,1,1-1.414-1.414l4-4a1,1,0,0,1,1.414,0Z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="feature-card-details">
                                <p>Valor Enviado</p>
                                @if ($last_amount_sent == [null])
                                    <h3>R$ 0,00</h3>
                                @else
                                    <h3>R$ {{ number_format($last_amount_sent['amount'], 2, ',', '.') }}</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-6 pb-15">
                        <div class="feature-card">
                            <div class="feature-card-thumb barda-fiz">
                                <svg width="64px" height="64px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier2" stroke-width="0">
                                        <rect x="-2.4" y="-2.4" width="28.80" height="28.80" rx="0"
                                            fill="#fff" strokewidth="0" />
                                    </g>

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier1">
                                        <path
                                            d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM8.64 7.15C8.93 6.86 9.41 6.86 9.7 7.15L14.08 11.53V9.1C14.08 8.69 14.42 8.35 14.83 8.35C15.24 8.35 15.58 8.69 15.58 9.1V13.34C15.58 13.44 15.56 13.53 15.52 13.63C15.44 13.81 15.3 13.96 15.11 14.04C15.02 14.08 14.92 14.1 14.82 14.1H10.58C10.17 14.1 9.83 13.76 9.83 13.35C9.83 12.94 10.17 12.6 10.58 12.6H13.01L8.64 8.21C8.35 7.92 8.35 7.45 8.64 7.15ZM18.24 17.22C16.23 17.89 14.12 18.23 12 18.23C9.88 18.23 7.77 17.89 5.76 17.22C5.37 17.09 5.16 16.66 5.29 16.27C5.42 15.88 5.84 15.66 6.24 15.8C9.96 17.04 14.05 17.04 17.77 15.8C18.16 15.67 18.59 15.88 18.72 16.27C18.84 16.67 18.63 17.09 18.24 17.22Z"
                                            fill="#292D32" />
                                    </g>
                                </svg>
                            </div>
                            <div class="feature-card-details">
                                <p>Valor Recebido</p>
                                @if ($last_value_received == [null])
                                    <h3>R$ 0,00</h3>
                                @else
                                    <h3>R$ {{ number_format($last_value_received['amount'], 2, ',', '.') }}</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feature-section -->
            <!-- Transaction-section -->
            <div class="transaction-section pb-15">
                <div class="section-header">
                    <h2>Historico</h2>
                    <div class="view-all">
                        <a href="{{ route('finance.get') }}">Ver tudo</a>
                    </div>

                </div>
                @if (empty($transactions))
                    <p>Nenhuma transação realizada</p>
                @endif

                @foreach ($transactions as $item)
                    <div class="transaction-card mb-15">
                        @if ($item['type_movement'] == 'CONVERSION')
                            <a href="{{ route('movement.get', ["$see_transaction_key" => $item['uuid']]) }}">
                                <div class="transaction-card-info">
                                    <div class="transaction-info-thumb">
                                        <img src="assets/images/sys-soocien/pessoa.svg" alt="user" />
                                    </div>
                                    <div class="transaction-info-text">
                                        <h3>CONVERSÃO</h3>
                                        <p>{!! $item['description'] !!}</p>
                                    </div>
                                </div>
                                @if ($item['type'] == 'ENTRY')
                                    <div class="transaction-card-det receive-money">
                                        + R$ {{ number_format($item['amount'], '2', ',', '.') }}
                                    </div>
                                @else
                                    <div class="transaction-card-det text-danger">
                                        - R$ {{ number_format($item['amount'], '2', ',', '.') }}
                                    </div>
                                @endif
                            </a>
                        @else
                            <a href="{{ route('transaction.get', ["$see_transaction_key" => $item['uuid']]) }}">
                                <div class="transaction-card-info">
                                    <div class="transaction-info-thumb">
                                        <img src="/assets/images/sys-soocien/pessoa.svg" alt="user">
                                    </div>
                                    <div class="transaction-info-text">
                                        @switch($item['type_movement'])
                                            @case('TRANSFER')
                                                <h3>TRANSFERÊNCIA</h3>
                                            @break

                                            @case('DEPOSIT')
                                                <h3>DEPÓSITO</h3>
                                            @break

                                            @case('WITHDRAWAL')
                                                <h3>SAQUE</h3>
                                            @break

                                            @case('CONVERSION')
                                                <h3>CONVERSÃO</h3>
                                            @break
                                        @endswitch
                                        <p>{!! $item['description'] !!}</p>
                                    </div>
                                </div>
                                @if ($item['type'] == 'ENTRY')
                                    <div class="transaction-card-det receive-money">
                                        + R$ {{ number_format($item['amount'], '2', ',', '.') }}
                                    </div>
                                @else
                                    <div class="transaction-card-det text-danger">
                                        - R$ {{ number_format($item['amount'], '2', ',', '.') }}
                                    </div>
                                @endif
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
            <!-- Transaction-section -->
            <!-- Send-money-section -->
            {{-- <div class="send-money-section pb-15">
                <div class="section-header">
                    <h2>Link's Rapido</h2>
                    <div class="view-all">
                        <a href="#">Ver Todos</a>
                    </div>
                </div>
                <div class="row gx-3">
                    <div class="col pb-15">
                        <div class="user-card">
                            <a href="#">
                                <div class="user-card-thumb">
                                    <img src="assets/images/sys-soocien/pessoa.svg" alt="user" />
                                </div>
                                <h3>Gabriela</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15">
                        <div class="user-card">
                            <a href="#">
                                <div class="user-card-thumb">
                                    <img src="assets/images/sys-soocien/pessoa.svg" alt="user" />
                                </div>
                                <h3>Jonas</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15">
                        <div class="user-card">
                            <a href="#">
                                <div class="user-card-thumb">
                                    <img src="assets/images/sys-soocien/pessoa.svg" alt="user" />
                                </div>
                                <h3>Patricia</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col pb-15">
                        <div class="user-card">
                            <a href="#">
                                <div class="user-card-thumb">
                                    <img src="assets/images/sys-soocien/pessoa.svg" alt="user" />
                                </div>
                                <h3>Guilherme</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="saving-goals-section pb-15 mt-4">
                <div class="section-header">
                    <h2>Minhas API's</h2>
                    <div class="view-all">
                        <a href="{{ route('keysapi.get') }}">Ver Todos</a>
                    </div>
                </div>
                @if (empty($keysApi))
                    <p>Nenhuma chave de API cadastrada</p>
                @endif
                @foreach ($keysApi as $item)
                    <div class="basic-carousel owl-carousel owl-theme mb-30">
                        <div class="item">
                            <div class="monthly-bill-card">
                                <div class="monthly-bill-thumb">
                                    <img src="assets/images/sys-soocien/area-api.svg" alt="logo" />
                                </div>
                                <div class="monthly-bill-body">
                                    <h3><a href="#">{{ $item['title'] }}</a></h3>
                                    <p>API ID: {{ $item['appId'] }}</p>
                                    <p>API KEY: {{ $item['appKey'] }}</p>
                                </div>
                                <div class="monthly-bill-footer monthly-bill-action">
                                    <a href="#" class="btn main-btn">ATIVO</a>
                                    <p class="monthly-bill-price">
                                        {{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="latest-news-section pb-15 mb-5">
                <div class="section-header">
                    <h2>Ultimas Noticias</h2>
                    <div class="view-all">
                        <a href="blogs.html">Ver Todos</a>
                    </div>
                </div>
                <div class="row gx-3">
                    <div class="col-6 pb-15">
                        <div class="blog-card">
                            <div class="blog-card-thumb">
                                <a href="#">
                                    <img src="assets/images/sys-soocien/noticias.jpg" alt="blog" />
                                </a>
                            </div>
                            <div class="blog-card-details">
                                <ul class="blog-entry">
                                    <li>Smith Rob</li>
                                    <li>15 Maio, 2024</li>
                                </ul>
                                <h3>
                                    <a href="#">Tesouro, LCI ou CDB: veja onde seu investimento pode
                                        render mais em 12 meses. Acesse</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pb-15">
                        <div class="blog-card">
                            <div class="blog-card-thumb">
                                <a href="#">
                                    <img src="assets/images/sys-soocien/noticias2.jpg" alt="blog" />
                                </a>
                            </div>
                            <div class="blog-card-details">
                                <ul class="blog-entry">
                                    <li>John Doe</li>
                                    <li>10 Maio, 2024</li>
                                </ul>
                                <h3>
                                    <a href="https://exame.com/future-of-money/pix-chega-a-30-das-compras-no-e-commerce-e-impulsiona-digitalizacao-na-america-latina-diz-pesquisa/"
                                        target="_blank">Pix chega a 30% das compras no e-commerce e impulsiona
                                        digitalização na América Latina, diz pesquisa</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest-news-section -->
        </div>
    </div>
    <!-- Body-content -->

    <!-- Withdraw-modal -->

    <!-- Send-money-modal -->
    <div class="modal fade" id="sendMoney" tabindex="-1" aria-labelledby="sendMoney" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="option-section mb-15">
                    <div class="row gx-3 px-2">
                        <div class="d-blok">
                            <p>
                                Área PIX
                                <i class="flaticon-down-arrow"></i>
                            </p>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-violet">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#withdraw">
                                    <div class="option-card-icon">
                                        <i class="flaticon-right-arrow"></i>
                                    </div>
                                    <p>Transferir</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-yellow">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addBalance">
                                    <div class="option-card-icon">
                                        <i class="flaticon-right-arrow"></i>
                                    </div>
                                    <p>Depositar</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-blue">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#copia-e-cola">
                                    <div class="option-card-icon">
                                        <i class="flaticon-credit-card"></i>
                                    </div>
                                    <p>Copia Cola</p>
                                </a>
                            </div>
                        </div>
                        <div class="col pb-15">
                            <div class="option-card option-card-red">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#makeLink">
                                    <div class="option-card-icon">
                                        <i class="flaticon-exchange-arrows"></i>
                                    </div>
                                    <p>Cobrar</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="arepix" tabindex="-1" aria-labelledby="sendMoney" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <i class="flaticon-right-arrow color-yellow"></i>
                            <h5 class="modal-title">Depositar</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group mb-15">
                                <label for="input6" class="form-label">Qual valor voce quer depositar
                                </label>
                                <input type="email" class="form-control" id="input6"
                                    placeholder="Digite o valor a ser depositado" />
                            </div>
                            <!-- <div class="form-group mb-15">
                                                                                                                                                                                             <label for="input7" class="form-label">To</label>
                                                                                                                                                                                             <input
                                                                                                                                                                                              type="email"
                                                                                                                                                                                              class="form-control"
                                                                                                                                                                                              id="input7"
                                                                                                                                                                                              placeholder="Bank ID"
                                                                                                                                                                                             />
                                                                                                                                                                                            </div> -->
                            <div class="form-group mb-15">
                                <label for="input8" class="form-label">Digite a chave para voce depositar</label>
                                <input type="email" class="form-control" id="input8"
                                    placeholder="Nome, CPF/CNPJ ou chave PIX" />
                            </div>
                            <button type="submit" class="btn main-btn main-btn-lg full-width">
                                Enviar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="copia-e-cola" tabindex="-1" aria-labelledby="sendMoney" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <div class="modal-header-title">
                            <i class="flaticon-right-arrow color-yellow"></i>
                            <h5 class="modal-title">Copia e cola</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group mb-15">
                                <label for="input6" class="form-label">Insira o codigo do Pix Copia e Cola
                                </label>
                                <input type="email" class="form-control" id="input6"
                                    placeholder="Coloque o código aqui" />
                            </div>
                            <!-- <div class="form-group mb-15">
                                                                                                                                                             <label for="input7" class="form-label">To</label>
                                                                                                                                                             <input
                                                                                                                                                              type="email"
                                                                                                                                                              class="form-control"
                                                                                                                                                              id="input7"
                                                                                                                                                              placeholder="Bank ID"
                                                                                                                                                             />
                                                                                                                                                            </div> -->
                            <!-- <div class="form-group mb-15">
                                                                                                                                                             <label for="input8" class="form-label"
                                                                                                                                                              >Digite a chave para voce depositar</label
                                                                                                                                                             >
                                                                                                                                                             <input
                                                                                                                                                              type="email"
                                                                                                                                                              class="form-control"
                                                                                                                                                              id="input8"
                                                                                                                                                              placeholder="Nome, CPF/CNPJ ou chave PIX"
                                                                                                                                                             />
                                                                                                                                                            </div> -->
                            <button type="submit" class="btn main-btn main-btn-lg full-width">
                                Enviar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    @include('livewire.components.modals.addBalance')
    @include('livewire.components.modals.sendMoney')
    @include('livewire.components.modals.p2p')

    <livewire:components.modals.link-payment />
    <livewire:components.modals.exchange />
@endsection
