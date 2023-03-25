<?php 

function _salt($password, $username){
	return md5(sprintf("%s+%s", $password, substr($username, 0,3)));
}