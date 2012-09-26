-- tb_types_users
INSERT INTO `tb_user_types` VALUES ('U', 'Usuário');
INSERT INTO `tb_user_types` VALUES ('A', 'Administrador');

-- tb_users
INSERT INTO `tb_users` VALUES ('1', 'admin', 'admin@youtroll.com.br', '$2a$08$MTE5MTgxMTA3NjUwNGNjYueUnwiDYXYJux7gdctNuSlwvfBg17C4m', NULL, NULL, NULL, NULL, 'pt_br', CURRENT_TIMESTAMP, '1', NULL, 'U');
INSERT INTO `tb_users` VALUES ('2', 'test.user', 'test.user@youtroll.com.br', '$2a$08$MTE5MTgxMTA3NjUwNGNjYueUnwiDYXYJux7gdctNuSlwvfBg17C4m', NULL, NULL, NULL, NULL, 'pt_br', CURRENT_TIMESTAMP, '1', NULL, 'U');