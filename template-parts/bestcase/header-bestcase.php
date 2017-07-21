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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.materialdesignicons.com/1.9.32/css/materialdesignicons.min.css" rel="stylesheet">

  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <header class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand">
            <a class="navbar-brand-logo" href="/bestcase">
              <h2 class="navbar-brand-wordmark">Best Case Bankruptcy</h2>
            </a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/bestcase/app/">Home</a></li>
            <li><a href="/bestcase/app/one-column/">1 Column</a></li>
            <li><a href="/bestcase/app/two-column/">2 Column</a></li>
            <li><a href="/bestcase/app/three-column/">3 Column</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <div class="navbar-notification dropdown">
                <button type="button" class="btn btn-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-placement="bottom" title="View Notifications">
                  <i class="mdi mdi-bell"></i><span class="badge super">3</span>
                </button>
                <div class="panel panel-montane notification" aria-labelledby="dropdownMenu1">
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
                  <img class="navbar-user-avatar" alt="Jeff Wilmoth" src="https://scontent-lga3-1.xx.fbcdn.net/v/t1.0-9/12743859_10208844733426448_4112989161731734849_n.jpg?oh=9760358367758d6834d72ef6a907232f&oe=597772D8">
                  <div class="navbar-user-dropdown">
                    <div class="user-dropdown-label">Jeff Wilmoth</div>
                    <i class="mdi mdi-menu-down"></i>
                  </div>
                </a>
                <div class="panel panel-montane user" aria-labelledby="dropdownMenu2">
                  <div class="panel-body">
                    <div class="list-group">
                      <a href="#" class="navbar-user-panel-avatar list-group-item" title="Edit profile picture">
                        <img class="img-responsive" alt="Jeff Wilmoth" src="https://scontent-lga3-1.xx.fbcdn.net/v/t1.0-9/12743859_10208844733426448_4112989161731734849_n.jpg?oh=9760358367758d6834d72ef6a907232f&oe=597772D8">
                      </a>
                      <a href="#" class="list-group-item">Personal Settings</a>
                      <a href="#" class="list-group-item">Firm Settings</a>
                      <a href="#" class="list-group-item">Integration Hub</a>
                      <dl>
                        <dt class="list-group-item">Firm Name:</dt>
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
