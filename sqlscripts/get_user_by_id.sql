SELECT tbl_user.password_hash, tbl_user.password_salt 
FROM tbl_user
WHERE tbl_user.pk_id_user = ?;
