<?php
delete_post($_GET['id']);
set_session_flash("Article Supprimer avec success");
redirect_to(url_for("dashboard.categories.index"));