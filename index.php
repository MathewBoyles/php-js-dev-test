<?php
  define('PAGE_ID', 'index');
  require_once('core/require.php');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.min.css">
  </head>
  <body>
    <div id="loader">
      <h5>Loading...</h5>
    </div>

    <header>
      <div class="navbar navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand">Users</a>
        </div>
      </div>
    </header>

    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Admin / Users</h1>
          <p class="lead text-muted">Below is a list of all registered users.</p>
        </div>
      </section>

      <div id="content" class="container">
        <table class="table table-striped" id="users">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Gender</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <script type="text/template7" id="usersListTmpl">
            <tbody id="usersList">
              {{#each users}}
              <tr data-user="{{id}}">
                <th scope="row">{{id}}</th>
                <td>{{first_name}}</td>
                <td>{{last_name}}</td>
                <td>{{gender}}</td>
                <td class="text-right">
                  <button type="button" class="btn btn-link" data-action="info">Info</button>
                </td>
              </tr>
              {{/each}}
            </tbody>
          </script>
        </table>

        <div class="card card-default" id="load">
          <div class="card-body text-center">
            <button class="btn btn-lg btn-secondary">Load users...</button>
          </div>
        </div>

        <div id="usersPagination">
          <select class="form-control"></select>
        </div>
      </div>
    </main>

    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="userInfoModal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="mySmallModalLabel">Info</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="modal-load">
              Loading...
            </div>
            <div id="userInfo">
              <script type="text/template7" id="userInfoTmpl">
                <div>
                  <strong>First name:</strong>
                  <p>{{first_name}}</p>

                  <strong>Last name:</strong>
                  <p>{{last_name}}</p>

                  <strong>Email:</strong>
                  <p>
                    {{#if email}}
                      <a href="mailto:{{email}}">{{email}}</a>
                    {{else}}
                      <em>No email</em>
                    {{/if}}
                  </p>

                  <strong>Gender:</strong>
                  <p>
                    {{#if gender}}
                      {{gender}}
                    {{else}}
                      <em>No gender</em>
                    {{/if}}
                  </p>

                  <strong>IP Address:</strong>
                  <p>
                    {{#if ip_address}}
                      {{ip_address}}
                    {{else}}
                      <em>No ip_address</em>
                    {{/if}}
                  </p>

                  <strong>Company:</strong>
                  <p>
                    {{#if company}}
                      {{company}}
                    {{else}}
                      <em>No company</em>
                    {{/if}}
                  </p>

                  <strong>City:</strong>
                  <p>
                    {{#if city}}
                      {{city}}
                    {{else}}
                      <em>No city</em>
                    {{/if}}
                  </p>

                  <strong>Title:</strong>
                  <p>
                    {{#if title}}
                      {{title}}
                    {{else}}
                      <em>No title</em>
                    {{/if}}
                  </p>

                  <strong>Website:</strong>
                  <p>
                    {{#if website}}
                      <a href="{{website}}" target="_blank">View website</a>
                    {{else}}
                      <em>No website</em>
                    {{/if}}
                  </p>
                </div>
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/template7/dist/template7.min.js"></script>
    <script src="js/script.min.js"></script>
  </body>
</html>
