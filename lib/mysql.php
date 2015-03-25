<?php

$con = mysqli_connect(getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
    getenv('OPENSHIFT_MYSQL_DB_PASSWORD'), getenv('OPENSHIFT_APP_NAME'))
or die("Error connecting to database");
