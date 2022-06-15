SELECT tbl_user.pk_id_user
FROM tbl_user
WHERE tbl_user.password_hash = ? AND tbl_user.password_salt = ?;
