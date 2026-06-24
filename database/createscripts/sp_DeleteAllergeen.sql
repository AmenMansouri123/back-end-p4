DROP PROCEDURE IF EXISTS sp_DeleteAllergeen;

DELIMITER $$

CREATE PROCEDURE sp_DeleteAllergeen(
    IN p_id INT
)

BEGIN

    DELETE FROM Allergeen
    WHERE id = p_id;

    SELECT ROW_COUNT() AS deleted;

END$$

DELIMITER ;