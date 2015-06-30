<?php include 'header.php' ?>
<?php include 'right_sidebar.php' ?>
<?php include 'left_sidebar.php' ?>

<!-- Main Container start -->
<div class="dashboard-wrapper">

  <!-- Bootstrap Container Start -->
  <div class="container">
    
    <!-- Page title start -->
    <div class="row page-title">
      
      <div class="col-lg-9 col-md-8 col-sm-9 col-xs-12">
        <h2>Dashboard</h2>
        <ul class="breadcrumb">
          <li>Home</li>
          <li>Dashboard</li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-3 hidden-sm hidden-xs">
        <div id="reportrange">
          <i class="icon-calendar"></i>
          <span></span> <b class="caret"></b>
        </div>
      </div>
    </div>
    <!-- Page title end -->

    <!-- Row start -->
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <a class="info-tiles tiles-secondary" href="#">
          <div class="tiles-heading">
            <div class="pull-left">Page Views</div>
            <div class="pull-right"><i class="icon-caret-down"></i> 21.9%</div>
          </div>
          <div class="tiles-body">
            <div class="pull-left animated bounceIn">
              <i class="icon-eye-open"></i>
            </div>
            <div class="pull-right number"><span id="views-x">0</span>K</div>
          </div>
          <div class="tiles-footer">
            <span class="pull-left">View more...</span>
            <span class="inline-sparkline pull-right" id="visits"></span>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <a class="info-tiles tiles-secondary" href="#">
          <div class="tiles-heading">
            <div class="pull-left">Likes</div>
            <div class="pull-right"><i class="icon-caret-up"></i> 7.7%</div>
          </div>
          <div class="tiles-body">
            <div class="pull-left animated bounceIn">
              <i class="icon-thumbs-up"></i>
            </div>
            <div class="pull-right number"><span id="likes-x">0</span></div>
          </div>
          <div class="tiles-footer">
            <span class="pull-left">View more...</span>
            <span class="inline-sparkline pull-right" id="unique-visitors"></span>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <a class="info-tiles tiles-secondary" href="#">
          <div class="tiles-heading">
            <div class="pull-left">Images Uploaded</div>
            <div class="pull-right"><i class="icon-caret-up"></i> 19.2%</div>
          </div>
          <div class="tiles-body">
            <div class="pull-left animated bounceIn">
              <i class="icon-picture"></i>
            </div>
            <div class="pull-right number"><span id="uploaded-x">0</span></div>
          </div>
          <div class="tiles-footer">
            <span class="pull-left">View more...</span>
            <span class="inline-sparkline pull-right" id="page-views"></span>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <a class="info-tiles tiles-primary" href="#">
          <div class="tiles-heading">
            <div class="pull-left">New Users</div>
            <div class="pull-right"><i class="icon-caret-up"></i> 19.8%</div>
          </div>
          <div class="tiles-body">
            <div class="pull-left animated bounceIn">
              <i class="icon-group"></i>
            </div>
            <div class="pull-right number"><span id="users-x">0</span></div>
          </div>
          <div class="tiles-footer">
            <span class="pull-left">View more...</span>
            <span class="inline-sparkline pull-right" id="bounce-rate"></span>
          </div>
        </a>
      </div>
    </div>
    <!-- Row end -->

    <!-- Row start -->
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sx-12 col-sm-12">
        <div class="panel panel-secondary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-bar-chart"></i>Statastics</h3>
          </div>
          <div class="panel-body">
            <div id="us-map" style="width: 100%; height: 260px"></div>
            <div class="jvectormap-title">
              Total Visits
              <h3 id="dyn-visits">0</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sx-12 col-sm-12">
        <div class="panel panel-secondary">
          <div class="panel-heading">
            <i class="icon-signal"></i>
            <h3 class="panel-title">Data Graph</h3>
          </div>
          <div class="panel-body center-align-text">
            <div class="light-grey-bg md-padding sm-border-radius">
              <span class="chart-width inline-sparkline" id="dataLine"></span>
              <span id="dow"></span>
            </div>
            <table class="table table-hover left-align-text">
              <thead>
                <tr>
                  <th style="width:45%;">Type</th>
                  <th style="width:35%;">Date</th>
                  <th style="width:20%;" class="right-align-text">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><i class="icon-cloud text-info"></i>Market</td>
                  <td>25/01/14</td>
                  <td class="right-align-text text-info">3257</td>
                </tr>
                <tr>
                  <td><i class="icon-inbox text-danger"></i> Referal</td>
                  <td>18/01/14</td>
                  <td class="right-align-text text-danger">1879</td>
                </tr>
                <tr>
                  <td><i class="icon-envelope text-info"></i> Affiliate</td>
                  <td>07/01/14</td>
                  <td class="right-align-text text-info">5598</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Row End -->

    <!-- Row Start -->
    <div class="row sortable">
      <div class="col-lg-4 col-md-6 col-sx-12 col-sm-12">
        <div class="panel panel-secondary ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-list"></i>
            <h3 class="panel-title">Tasks List</h3>
          </div>
          <div class="panel-body">
            <section class="todo">
              <fieldset class="todo-list">
                <label class="todo-list-item">
                  <input type="checkbox" class="todo-list-cb">
                  <span class="todo-list-mark"></span>
                  <span class="todo-list-desc">Attend research seminar</span>
                  <span class="todo-list-date">
                    <span class="label label-info">Feb 15</span>
                  </span>
                </label>
                <label class="todo-list-item">
                  <input type="checkbox" class="todo-list-cb">
                  <span class="todo-list-mark"></span>
                  <span class="todo-list-desc">Social media workshop</span>
                  <span class="todo-list-date">
                    <span class="label label-info">Feb 09</span>
                  </span>
                </label>
                <label class="todo-list-item">
                  <input type="checkbox" class="todo-list-cb" checked>
                  <span class="todo-list-mark"></span>
                  <span class="todo-list-desc">Pickup kids @4pm</span>
                  <span class="todo-list-date">
                    <span class="label label-info">Feb 02</span>
                  </span>
                </label>
                <label class="todo-list-item">
                  <input type="checkbox" class="todo-list-cb">
                  <span class="todo-list-mark"></span>
                  <span class="todo-list-desc">Attend Birthday party</span>
                  <span class="todo-list-date">
                    <span class="label label-info">Jan 21</span>
                  </span>
                </label>
                <label class="todo-list-item">
                  <input type="checkbox" class="todo-list-cb" checked>
                  <span class="todo-list-mark"></span>
                  <span class="todo-list-desc">The Power of Habit</span>
                  <span class="todo-list-date">
                    <span class="label label-info">Jan 17</span>
                  </span>
                </label>
                <label class="todo-list-item">
                  <input type="checkbox" class="todo-list-cb">
                  <span class="todo-list-mark"></span>
                  <span class="todo-list-desc">Learn Chess</span>
                  <span class="todo-list-date">
                    <span class="label label-info">Jan 14</span>
                  </span>
                </label>
                <label class="todo-list-item">
                  <input type="checkbox" class="todo-list-cb">
                  <span class="todo-list-mark"></span>
                  <span class="todo-list-desc">Send an email to Jas</span>
                  <span class="todo-list-date">
                    <span class="label label-info">Jan 11</span>
                  </span>
                </label>
              </fieldset>
            </section>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sx-12 col-sm-12">
        <div class="panel panel-secondary ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-twitter"></i>
            <h3 class="panel-title">Server Activity</h3>
          </div>
          <div class="panel-body">
            <ul class="activity-list">
              <li>
                <div class="row">
                  <div class="col-xs-8">
                    <p><i class="icon-flag-alt text-info"></i> Pending request</p>
                  </div>
                  <div class="col-xs-4">
                    <p class="time">3 hrs</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-xs-8">
                    <p><i class="icon-fire text-warning"></i> Server Crashed</p>
                  </div>
                  <div class="col-xs-4">
                    <p class="time">3mins</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-xs-8">
                    <p><i class="icon-smile text-success"></i> 3 New users</p>
                  </div>
                  <div class="col-xs-4">
                    <p class="time">1 min</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-xs-8">
                    <p><i class="icon-bell text-danger"></i>9 pending requests</p>
                  </div>
                  <div class="col-xs-4">
                    <p class="time">5 min</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-xs-8">
                    <p><i class="icon-plane text-info"></i> Performance</p>
                  </div>
                  <div class="col-xs-4">
                    <p class="time">25 min</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-xs-8">
                    <p><i class="icon-envelope-alt text-warning"></i>12 new emails</p>
                  </div>
                  <div class="col-xs-4">
                    <p class="time">25 min</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-xs-8">
                    <p><i class="icon-cog icon-spin text-success"></i> Location settings</p>
                  </div>
                  <div class="col-xs-4">
                    <p class="time">4 hrs</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sx-12 col-sm-12">
        <div class="panel panel-secondary ui-state-default">
          <div class="panel-heading cursor-move">
            <i class="icon-comment"></i>
            <h3 class="panel-title">Chats</h3>
          </div>
          <div class="panel-body">
            <ul class="chats">
              <li class="in">
                <img class="avatar" alt="" src="img/avatar-1.jpg">
                <div class="message">
                  <span class="arrow"></span>
                  <span class="body body-grey">
                    Raw denim probably haven't heard about this today.
                  </span>
                  <a href="#" class="name">
                    Kelly
                  </a>
                  <span class="date-time">
                    at 12:18pm
                  </span>
                </div>
              </li>
              <li class="out">
                <img class="avatar" alt="" src="img/avatar-2.jpg">
                <div class="message">
                  <span class="arrow"></span>
                  <span class="body body-blue">
                    Next level team will stumptown thundercats.
                  </span>
                  <a href="#" class="name">
                    Rosy
                  </a>
                  <span class="date-time">
                    at 12:24pm
                  </span>
                </div>
              </li>
              <li class="in">
                <img class="avatar" alt="" src="img/avatar-1.jpg">
                <div class="message">
                  <span class="arrow"></span>
                  <span class="body body-grey">
                    Beard stumptown is a good single origin coffee.
                  </span>
                  <a href="#" class="name">
                    Kelly
                  </a>
                  <span class="date-time">
                    at 10:25pm
                  </span>
                </div>
              </li>
              <li>
                <div class="input-group">
                  <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Send</button>
                  </span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Row End -->

    <!-- Row Start -->
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12 col-sx-12">
        <div class="panel panel-secondary">
          <div class="panel-heading">
            <i class="icon-coffee"></i>
            <h3 class="panel-title">Invoice Activity</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <div id="dt_example" class="table-responsive example_alt_pagination clearfix">
                <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                  <thead>
                    <tr>
                      <th style="width:3%">
                        <input type="checkbox">
                      </th>
                      <th style="width:12%">Date</th>
                      <th style="width:15%">Inv. No</th>
                      <th style="width:40%">Client Details</th>
                      <th style="width:15%">Status</th>
                      <th style="width:15%">Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 1167</td>
                      <td>
                        <a href="invoice.html">
                          Honey - <small>Consultancy fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$839</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 12</td>
                      <td>Inv - 3981</td>
                      <td>
                        <a href="invoice.html">
                          James - <small>Testing</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Success</span>
                      </td>
                      <td>
                        <span class="text-primary">$2187</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 4482</td>
                      <td>
                        <a href="invoice.html">
                           Selva - <small>Web Design</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-warning">Warning</span>
                      </td>
                      <td>
                        <span class="text-warning">$490</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 29</td>
                      <td>Inv - 3289</td>
                      <td>
                        <a href="invoice.html">
                          Sweet Dreams - <small>Web Developement</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$1184</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 23</td>
                      <td>Inv - 1093</td>
                      <td>
                        <a href="invoice.html">
                          Kohli - <small>Photography fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$280</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 28</td>
                      <td>Inv - 2289</td>
                      <td>
                        <a href="invoice.html">
                          Nyra - <small>Fireworks</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$110</span>
                      </td>
                    </tr>
                    <tr class="gradeX">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Apr 09</td>
                      <td>Inv - 1145</td>
                      <td>
                        <a href="invoice.html">
                          Henrik - <small>Design works</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-primary">$27</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 01</td>
                      <td>Inv - 5120</td>
                      <td>
                        <a href="invoice.html">
                          Rosy - <small>Salary</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$600</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 1167</td>
                      <td>
                        <a href="invoice.html">
                          Honey - <small>Consultancy fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$839</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 12</td>
                      <td>Inv - 3981</td>
                      <td>
                        <a href="invoice.html">
                           James - <small>Testing</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Success</span>
                      </td>
                      <td>
                        <span class="text-primary">$2187</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 4482</td>
                      <td>
                        <a href="invoice.html">
                          Selva - <small>Web Design</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-warning">Warning</span>
                      </td>
                      <td>
                        <span class="text-warning">$490</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 29</td>
                      <td>Inv - 3289</td>
                      <td>
                        <a href="invoice.html">
                          Sweet Dreams - <small>Web Developement</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$1184</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 23</td>
                      <td>Inv - 1093</td>
                      <td>
                        <a href="invoice.html">
                          Kohli - <small>Photography fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$280</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 28</td>
                      <td>Inv - 2289</td>
                      <td>
                        <a href="invoice.html">
                          Nyra - <small>Fireworks</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$110</span>
                      </td>
                    </tr>
                    <tr class="gradeX">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Apr 09</td>
                      <td>Inv - 1145</td>
                      <td>
                        <a href="invoice.html">
                          Henrik - <small>Design works</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-primary">$27</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 01</td>
                      <td>Inv - 5120</td>
                      <td>
                        <a href="invoice.html">
                          Rosy - <small>Salary</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$900</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 1167</td>
                      <td>
                        <a href="invoice.html">
                          Honey - <small>Consultancy fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$189</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 12</td>
                      <td>Inv - 3981</td>
                      <td>
                        <a href="invoice.html">
                          James - <small>Testing</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Success</span>
                      </td>
                      <td>
                        <span class="text-primary">$2187</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 4482</td>
                      <td>
                        <a href="invoice.html">
                          Selva - <small>Web Design</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-warning">Warning</span>
                      </td>
                      <td>
                        <span class="text-warning">$1490</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 29</td>
                      <td>Inv - 3289</td>
                      <td>
                        <a href="invoice.html">
                          Sweet Dreams - <small>Web Developement</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$1184</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 23</td>
                      <td>Inv - 1093</td>
                      <td>
                        <a href="invoice.html">
                          Kohli - <small>Photography fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$1280</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 28</td>
                      <td>Inv - 2289</td>
                      <td>
                        <a href="invoice.html">
                          Nyra - <small>Fireworks</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$310</span>
                      </td>
                    </tr>
                    <tr class="gradeX">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Apr 09</td>
                      <td>Inv - 1145</td>
                      <td>
                        <a href="invoice.html">
                          Henrik - <small>Design works</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-primary">$727</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 01</td>
                      <td>Inv - 5120</td>
                      <td>
                        <a href="invoice.html">
                          Rosy - <small>Salary</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$600</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 1167</td>
                      <td>
                        <a href="invoice.html">
                          Honey - <small>Consultancy fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$289</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 12</td>
                      <td>Inv - 3981</td>
                      <td>
                        <a href="invoice.html">
                          James - <small>Testing</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Success</span>
                      </td>
                      <td>
                        <span class="text-primary">$2187</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 4482</td>
                      <td>
                        <a href="invoice.html">
                          Prema - <small>Web Design</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-warning">Warning</span>
                      </td>
                      <td>
                        <span class="text-warning">$5490</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 29</td>
                      <td>Inv - 3289</td>
                      <td>
                        <a href="invoice.html">
                          Sweet Dreams - <small>Web Developement</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$1184</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 23</td>
                      <td>Inv - 1093</td>
                      <td>
                        <a href="invoice.html">
                          Nayna - <small>Photography fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$1280</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 28</td>
                      <td>Inv - 2289</td>
                      <td>
                        <a href="invoice.html">
                          Dumburu - <small>Fireworks</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$3110</span>
                      </td>
                    </tr>
                    <tr class="gradeX">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Apr 09</td>
                      <td>Inv - 1145</td>
                      <td>
                        <a href="invoice.html">
                          Henrik - <small>Design works</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-primary">$1127</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 01</td>
                      <td>Inv - 5120</td>
                      <td>
                        <a href="invoice.html">
                          Rosy - <small>Salary</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$600</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 1167</td>
                      <td>
                        <a href="invoice.html">
                          Honey - <small>Consultancy fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$489</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 12</td>
                      <td>Inv - 3981</td>
                      <td>
                        <a href="invoice.html">
                          James - <small>Testing</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Success</span>
                      </td>
                      <td>
                        <span class="text-primary">$2187</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 4482</td>
                      <td>
                        <a href="invoice.html">
                          Selva - <small>Web Design</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-warning">Warning</span>
                      </td>
                      <td>
                        <span class="text-warning">$4490</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 29</td>
                      <td>Inv - 3289</td>
                      <td>
                        <a href="invoice.html">
                          Muruguppa - <small>Web Developement</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$1184</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 23</td>
                      <td>Inv - 1093</td>
                      <td>
                        <a href="invoice.html">
                          Dhoni - <small>Photography fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$280</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Nov 28</td>
                      <td>Inv - 2289</td>
                      <td>
                        <a href="invoice.html">
                          Rahul - <small>Fireworks</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$1310</span>
                      </td>
                    </tr>
                    <tr class="gradeX">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Apr 09</td>
                      <td>Inv - 1145</td>
                      <td>
                        <a href="invoice.html">
                          Rajeev - <small>Design works</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-primary">$227</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 01</td>
                      <td>Inv - 5120</td>
                      <td>
                        <a href="invoice.html">
                          Micky - <small>Salary</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$600</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 1167</td>
                      <td>
                        <a href="invoice.html">
                          Muni - <small>Consultancy fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$389</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 12</td>
                      <td>Inv - 3981</td>
                      <td>
                        <a href="invoice.html">
                          James - <small>Testing</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Success</span>
                      </td>
                      <td>
                        <span class="text-primary">$2187</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Feb 10</td>
                      <td>Inv - 4482</td>
                      <td>
                        <a href="invoice.html">
                          Selva - <small>Web Design</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-warning">Warning</span>
                      </td>
                      <td>
                        <span class="text-warning">$990</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 29</td>
                      <td>Inv - 3289</td>
                      <td>
                        <a href="invoice.html">
                          Sweet Dreams - <small>Web Developement</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$1184</span>
                      </td>
                    </tr>
                    <tr class="gradeA">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 23</td>
                      <td>Inv - 1093</td>
                      <td>
                        <a href="invoice.html">
                          Kohli - <small>Photography fee</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-info">$880</span>
                      </td>
                    </tr>
                    <tr class="gradeU">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 20</td>
                      <td>Inv - 2289</td>
                      <td>
                        <a href="invoice.html">
                          Nyra - <small>Fireworks</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$1910</span>
                      </td>
                    </tr>
                    <tr class="gradeX">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 09</td>
                      <td>Inv - 1145</td>
                      <td>
                        <a href="invoice.html">
                          Henrik - <small>Design works</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-info">Sent</span>
                      </td>
                      <td>
                        <span class="text-primary">$1227</span>
                      </td>
                    </tr>
                    <tr class="gradeC">
                      <td>
                        <input type="checkbox">
                      </td>
                      <td>Jan 10</td>
                      <td>Inv - 5120</td>
                      <td>
                        <a href="invoice.html">
                          Rosy - <small>Salary</small>
                        </a>
                      </td>
                      <td>
                        <span class="label label-default">Pending</span>
                      </td>
                      <td>
                        <span class="text-warning">$2600</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-12 col-sm-12 col-sx-12">
        <div class="panel panel-secondary">
          <div class="panel-heading">
            <i class="icon-calendar"></i>
            <h3 class="panel-title">Datepicker</h3>
          </div>
          <div class="panel-body">
            <div id="datepicker"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Row End -->

  </div>
  <!-- Bootstrap Container End -->

</div>
<!-- Main Container End -->

<?php include 'footer.php' ?>