
DROP PROCEDURE IF EXISTS convertToInnodb;
DELIMITER //
CREATE PROCEDURE convertToInnodb()
BEGIN
mainloop: LOOP
  SELECT TABLE_NAME INTO @convertTable FROM information_schema.TABLES
  WHERE `TABLE_SCHEMA` LIKE DATABASE()
  AND `ENGINE` LIKE 'MyISAM' ORDER BY TABLE_NAME LIMIT 1;
  IF @convertTable IS NULL THEN 
    LEAVE mainloop;
  END IF;
  SET @sqltext := CONCAT('ALTER TABLE `', DATABASE(), '`.`', @convertTable, '` ENGINE = INNODB');
  PREPARE convertTables FROM @sqltext;
  EXECUTE convertTables;
  DEALLOCATE PREPARE convertTables;
  SET @convertTable = NULL;
END LOOP mainloop;

END//
DELIMITER ;

CALL convertToInnodb(); DROP PROCEDURE IF EXISTS convertToInnodb;

