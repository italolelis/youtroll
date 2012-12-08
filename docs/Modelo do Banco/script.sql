SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `youtroll_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `youtroll_db` ;

-- -----------------------------------------------------
-- Table `youtroll_db`.`tb_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `youtroll_db`.`tb_users` (
  `usr_id` BIGINT NOT NULL AUTO_INCREMENT ,
  `usr_name` VARCHAR(100) NULL ,
  `usr_email` VARCHAR(50) NOT NULL ,
  `usr_password` VARCHAR(128) NULL ,
  `usr_birthday` DATE NULL ,
  `usr_gender` VARCHAR(1) NULL ,
  `usr_bio` VARCHAR(512) NULL ,
  `usr_site` VARCHAR(255) NULL ,
  `usr_locale` VARCHAR(5) NULL ,
  `usr_type` CHAR(1) NOT NULL DEFAULT 'U' ,
  `usr_record` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `usr_status` INT NOT NULL DEFAULT 1 ,
  `usr_profile_path` VARCHAR(128) NULL ,
  PRIMARY KEY (`usr_id`) ,
  UNIQUE INDEX `usr_email_UNIQUE` (`usr_email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `youtroll_db`.`tb_channels`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `youtroll_db`.`tb_channels` (
  `chnl_id` BIGINT NOT NULL AUTO_INCREMENT ,
  `chnl_fk_owner` BIGINT NOT NULL ,
  `chnl_name` VARCHAR(50) NOT NULL ,
  `chnl_record` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`chnl_id`) ,
  UNIQUE INDEX `chnl_name_UNIQUE` (`chnl_name` ASC) ,
  INDEX `fk_tb_channels_tb_users1` (`chnl_fk_owner` ASC) ,
  UNIQUE INDEX `chnl_fk_owner_UNIQUE` (`chnl_fk_owner` ASC) ,
  CONSTRAINT `fk_tb_channels_tb_users1`
    FOREIGN KEY (`chnl_fk_owner` )
    REFERENCES `youtroll_db`.`tb_users` (`usr_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `youtroll_db`.`tb_categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `youtroll_db`.`tb_categories` (
  `ctg_id` INT NOT NULL AUTO_INCREMENT COMMENT '	' ,
  `ctg_name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`ctg_id`) ,
  UNIQUE INDEX `ctg_name_UNIQUE` (`ctg_name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `youtroll_db`.`tb_inscriptions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `youtroll_db`.`tb_inscriptions` (
  `insc_fk_channel` BIGINT NOT NULL ,
  `insc_fk_user` BIGINT NOT NULL ,
  `insc_receive_email` TINYINT(1) NOT NULL DEFAULT true ,
  `insc_record` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`insc_fk_channel`, `insc_fk_user`) ,
  INDEX `fk_tb_inscriptions_tb_users1` (`insc_fk_user` ASC) ,
  CONSTRAINT `fk_tb_inscriptions_tb_channels1`
    FOREIGN KEY (`insc_fk_channel` )
    REFERENCES `youtroll_db`.`tb_channels` (`chnl_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_inscriptions_tb_users1`
    FOREIGN KEY (`insc_fk_user` )
    REFERENCES `youtroll_db`.`tb_users` (`usr_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `youtroll_db`.`tb_publications`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `youtroll_db`.`tb_publications` (
  `pbct_id` BIGINT NOT NULL AUTO_INCREMENT ,
  `pbct_title` VARCHAR(100) NOT NULL ,
  `pbct_description` VARCHAR(256) NOT NULL ,
  `pbct_record` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `pbct_image_path` VARCHAR(128) NOT NULL ,
  `pbct_hits` INT NOT NULL DEFAULT 0 ,
  `pbct_fake_hits` INT NOT NULL DEFAULT 0 ,
  `pbct_fk_owner` BIGINT NOT NULL ,
  `pbct_fk_category` INT NOT NULL ,
  `pbct_fk_channel` BIGINT NOT NULL ,
  PRIMARY KEY (`pbct_id`) ,
  INDEX `fk_tb_publications_tb_users1` (`pbct_fk_owner` ASC) ,
  INDEX `fk_tb_publications_tb_categories1_idx` (`pbct_fk_category` ASC) ,
  INDEX `fk_tb_publications_tb_channels1_idx` (`pbct_fk_channel` ASC) ,
  CONSTRAINT `fk_tb_publications_tb_users1`
    FOREIGN KEY (`pbct_fk_owner` )
    REFERENCES `youtroll_db`.`tb_users` (`usr_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_publications_tb_categories1`
    FOREIGN KEY (`pbct_fk_category` )
    REFERENCES `youtroll_db`.`tb_categories` (`ctg_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_publications_tb_channels1`
    FOREIGN KEY (`pbct_fk_channel` )
    REFERENCES `youtroll_db`.`tb_channels` (`chnl_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `youtroll_db`.`tb_tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `youtroll_db`.`tb_tags` (
  `tag_id` INT NOT NULL AUTO_INCREMENT ,
  `tag_name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`tag_id`) ,
  UNIQUE INDEX `tag_description_UNIQUE` (`tag_name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `youtroll_db`.`tb_publications_tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `youtroll_db`.`tb_publications_tags` (
  `pbct_tag_fk_publication` BIGINT NOT NULL ,
  `pbct_tag_fk_tag` INT NOT NULL ,
  PRIMARY KEY (`pbct_tag_fk_publication`, `pbct_tag_fk_tag`) ,
  INDEX `fk_tb_publications_has_tb_tags_tb_tags1` (`pbct_tag_fk_tag` ASC) ,
  INDEX `fk_tb_publications_has_tb_tags_tb_publications1` (`pbct_tag_fk_publication` ASC) ,
  CONSTRAINT `fk_tb_publications_has_tb_tags_tb_publications1`
    FOREIGN KEY (`pbct_tag_fk_publication` )
    REFERENCES `youtroll_db`.`tb_publications` (`pbct_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_publications_has_tb_tags_tb_tags1`
    FOREIGN KEY (`pbct_tag_fk_tag` )
    REFERENCES `youtroll_db`.`tb_tags` (`tag_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `youtroll_db`.`tb_reviews_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `youtroll_db`.`tb_reviews_users` (
  `rvw_usr_fk_publication` BIGINT NOT NULL ,
  `rvw_usr_fk_user` BIGINT NOT NULL ,
  `rvw_usr_like` TINYINT(1) NULL ,
  PRIMARY KEY (`rvw_usr_fk_publication`, `rvw_usr_fk_user`) ,
  INDEX `fk_tb_publications_has_tb_users_tb_users1_idx` (`rvw_usr_fk_user` ASC) ,
  INDEX `fk_tb_publications_has_tb_users_tb_publications1_idx` (`rvw_usr_fk_publication` ASC) ,
  CONSTRAINT `fk_tb_publications_has_tb_users_tb_publications1`
    FOREIGN KEY (`rvw_usr_fk_publication` )
    REFERENCES `youtroll_db`.`tb_publications` (`pbct_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_publications_has_tb_users_tb_users1`
    FOREIGN KEY (`rvw_usr_fk_user` )
    REFERENCES `youtroll_db`.`tb_users` (`usr_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
