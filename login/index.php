<?php
// This file will be executed once the user logs in through webauth.
if (array_key_exists('origin', $_GET)) {
    // If we have a url to return to, go to that.
    header("Location: " . $_GET['origin']);
}
else {
    // Otherwise, go back to the main site.
    header("Location: ..");
}
?>
