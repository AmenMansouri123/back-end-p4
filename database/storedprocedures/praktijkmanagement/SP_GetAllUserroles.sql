USE Breezedemo;

DROP PROCEDURE IF EXISTS SP_GetAllUserroles;

DELIMITER $$

CREATE PROCEDURE SP_GetAllUserroles(
    IN p_Id INTEGER
)
BEGIN

    SELECT DISTINCT (USRS.rolename)
    FROM Users as USRS;
    
END$$

DELIMITER ;