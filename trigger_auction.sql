DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    TRIGGER `webcont_mosaico`.`trigger_auction` AFTER UPDATE
    ON `webcont_mosaico`.`auction`
    FOR EACH ROW BEGIN
	IF NEW.status='INACTIVE' THEN
		IF (SELECT COUNT(*) FROM cart WHERE cart.`user_id`=NEW.user_id AND cart.`status`='CREATED')=1 THEN
			INSERT INTO productscart VALUES ((SELECT id FROM cart WHERE cart.`user_id`=NEW.user_id AND cart.`status`='CREATED'),NEW.product_id,1,'YES');
		ELSE
			INSERT INTO cart (user_id,creation_date,STATUS) VALUES (NEW.user_id,NOW(),'CREATED');
			INSERT INTO productscart VALUES ((SELECT id FROM cart WHERE cart.`user_id`=NEW.user_id AND cart.`status`='CREATED'),NEW.product_id,1,'YES');
		END IF;
	END IF;
    END$$

DELIMITER ;