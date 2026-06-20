USE breezedemo;

DROP PROCEDURE IF EXISTS Sp_GetUserById;

DELIMITER $$

CREATE PROCEDURE Sp_GetUserById(
    IN p_Id INTEGER
    )
BEGIN

    SELECT USRS.Id
          ,USRS.name
          ,USRS.email
          ,USRS.rolename
    FROM Users as USRS
    WHERE USRS.Id = p_Id;
    
END$$

DELIMITER ;