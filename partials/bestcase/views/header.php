<?php
/**
* The Header for the Best Case Online Example Application
*
*
* @package Silverback
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/public/img/favicon.ico">

  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

</head>
<body class="page-template-app-bestcase">
  <?php
  // Get the queried object and sanitize it
  $current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
  // Get the page slug
  $slug = $current_page->post_name;
  //debug_to_console( $slug );
  // Set var showpage to the post slug
  $showPage = $slug;

  switch ( $showPage ) {

    case 'at1':
    echo '<div id="app" class="at1">';
    break;

    case 'at2':
    echo '<div id="app" class="at2">';
    break;

    case 'at3':
    echo '<div id="app" class="at3">';
    break;

    case 'at4':
    echo '<div id="app" class="at4">';
    break;

    default:
    echo '<div id="app" class="at1">';
    break;
  }
  ?>

  <header id="app-header" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-header-navbar" aria-expanded="false" aria-controls="app-header-navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand">
          <div class="navbar-brand-logo">
            <a class="navbar-brand-link" href="/bestcase/layout/app-templates/">Best Case Bankruptcy</a>
          </div>
        </div><!--/.navbar-brand -->
      </div>
      <div id="app-header-navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <?php
          switch ( $showPage ) {

            case 'at1':
            echo '
            <li class="active"><a href="/bestcase/layout/app-templates/at1">AT1</a></li>
            <li><a href="/bestcase/layout/app-templates/at2">AT2</a></li>
            <li><a href="/bestcase/layout/app-templates/at3">AT3</a></li>
            <li><a href="/bestcase/layout/app-templates/at4">AT4</a></li>
            ';
            break;

            case 'at2':
            echo '
            <li><a href="/bestcase/layout/app-templates/at1">AT1</a></li>
            <li class="active"><a href="/bestcase/layout/app-templates/at2">AT2</a></li>
            <li><a href="/bestcase/layout/app-templates/at3">AT3</a></li>
            <li><a href="/bestcase/layout/app-templates/at4">AT4</a></li>
            ';
            break;

            case 'at3':
            echo '
            <li><a href="/bestcase/layout/app-templates/at1">AT1</a></li>
            <li><a href="/bestcase/layout/app-templates/at2">AT2</a></li>
            <li class="active"><a href="/bestcase/layout/app-templates/at3">AT3</a></li>
            <li><a href="/bestcase/layout/app-templates/at4">AT4</a></li>
            ';
            break;

            case 'at4':
            echo '
            <li><a href="/bestcase/layout/app-templates/at1">AT1</a></li>
            <li><a href="/bestcase/layout/app-templates/at2">AT2</a></li>
            <li><a href="/bestcase/layout/app-templates/at3">AT3</a></li>
            <li class="active"><a href="/bestcase/layout/app-templates/at4">AT4</a></li>
            ';
            break;

            default:
            echo '
            <li><a href="/bestcase/layout/app-templates/at1">AT1</a></li>
            <li><a href="/bestcase/layout/app-templates/at2">AT2</a></li>
            <li><a href="/bestcase/layout/app-templates/at3">AT3</a></li>
            <li><a href="/bestcase/layout/app-templates/at4">AT4</a></li>
            <li class="active"><a href="/bestcase/layout/app-templates/';
            echo $showPage;
            echo '/">';
            echo $showPage;
            echo '</a></li>';
            break;
          }
          ?>


        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <div class="navbar-notification dropdown">
              <button type="button" class="btn btn-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-placement="bottom" title="View Notifications">
                <i class="mdi mdi-bell"></i><span class="badge super">3</span>
              </button>
              <div class="panel panel-notification-list" aria-labelledby="dropdownMenu1">
                <div class="panel-body">
                  <div class="list-group">
                    <a href="#" class="list-group-item" title="Manage CM/ECF Logins">
                      <div class="navbar-notification-icon">
                        <i class="mdi mdi-checkbox-marked-circle success"></i>
                      </div>
                      <div class="navbar-notification-message">
                        Your CM/ECF login for Northern District of Carolina has been successfully registered with the court.
                      </div>
                      <div class="navbar-notification-time">
                        1 min ago
                      </div>
                    </a>
                    <a href="#" class="list-group-item" title="Approve or deny access">
                      <div class="navbar-notification-icon">
                        <i class="mdi mdi-information info"></i>
                      </div>
                      <div class="navbar-notification-message">
                        Joe Smith is asking to join Best Case.
                      </div>
                      <div class="navbar-notification-time">
                        3 min ago
                      </div>
                    </a>
                    <a href="#" class="list-group-item" title="Manage CM/ECF Logins">
                      <div class="navbar-notification-icon">
                        <i class="mdi mdi-alert-circle error"></i>
                      </div>
                      <div class="navbar-notification-message">
                        Your CM/ECF login for Eastern District of California could not be registered with the court.
                      </div>
                      <div class="navbar-notification-time">
                        4 hrs ago
                      </div>
                    </a>
                  </div>
                </div>
                <div class="panel-footer">
                  <div class="panel-footer-content">
                    <div class="footer-content-left">
                      <button type="button" class="btn btn-primary">View All Notifications</button>
                      <button type="button" class="btn btn-link">Mark all as read</button>
                    </div>
                    <div class="footer-content-right">
                      <button type="button" class="close" data-dismiss="dropdown" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="navbar-user dropdown">
              <a href="#" class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-placement="bottom" title="Settings for Jeff Wilmoth">
                <img class="navbar-user-avatar" alt="Jeff Wilmoth" src="https://scontent-lga3-1.xx.fbcdn.net/v/t1.0-9/20294289_10213892974429318_9029462014244210871_n.jpg?oh=72a310b0558334e78fb4207068c357d5&oe=5A0DDF68">
                <div class="navbar-user-dropdown">
                  <div class="user-dropdown-label">Jeff Wilmoth</div>
                  <i class="mdi mdi-menu-down"></i>
                </div>
              </a>
              <div class="panel panel-user" aria-labelledby="dropdownMenu2">
                <div class="panel-body">
                  <div class="list-group">
                    <span class="list-group-item list-group-title">Settings</span>
                    <a href="#" class="list-group-item">Personal</a>
                    <a href="#" class="list-group-item">Firm</a>
                    <a href="#" class="list-group-item">Integration Hub</a>
                  </div>
                  <div class="list-group">
                    <dl>
                      <dt class="list-group-item list-group-title">Firm</dt>
                      <dd class="list-group-item">Jones, Johns, &amp; Jans</dd>
                    </dl>
                  </div>
                </div>
                <div class="panel-footer">
                  <div class="panel-footer-content">
                    <div class="footer-content-left">
                      <button type="button" class="btn btn-primary btn-block">Sign out</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </header>
