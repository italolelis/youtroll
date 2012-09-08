-- tb_types_users
INSERT INTO `tb_user_types` VALUES ('U', 'Usuário');
INSERT INTO `tb_user_types` VALUES ('A', 'Administrador');

-- tb_users
INSERT INTO `tb_users` VALUES ('1', 'admin', 'admin@youtroll.com.br', '$2a$08$elabjx6eb7zzmnmw1sdnyubxdhtwjkn36xd7vz3t37vezgycmo2xq', NULL, NULL, NULL, NULL, 'pt_br', CURRENT_TIMESTAMP, '1', NULL, 'U');
INSERT INTO `tb_users` VALUES ('2', 'test.user', 'test.user@youtroll.com.br', '$2a$08$ssvifuo0exrjnktx6qusye8ega9pkxuhctqg/ipkijagj0nai0b.y', NULL, NULL, NULL, NULL, 'pt_br', CURRENT_TIMESTAMP, '1', NULL, 'U');