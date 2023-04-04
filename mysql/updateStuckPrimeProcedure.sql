DROP PROCEDURE IF EXISTS UpdatePrime;

DELIMITER //

CREATE PROCEDURE UpdatePrime(
	IN candidate VARCHAR(50)
)
BEGIN
	DECLARE candidateTestId BIGINT(20);

    DECLARE _decimalLength DOUBLE;

    SELECT DecimalLength INTO _decimalLength FROM Candidate WHERE CandidateName = candidate;
    SELECT TestID INTO candidateTestId FROM CandidateTest WHERE CandidateName = candidate;

    SELECT candidateTestId, _decimalLength;

	UPDATE Candidate SET CompletedTests = 1, HasPendingTest = 0, MainTestResult = 2 WHERE CandidateName = candidate;
	UPDATE CandidateTest SET IsCompleted = 1 WHERE CandidateName = candidate;

    INSERT INTO CandidateTestResult (
		CandidateName, TestID, TestIndex, WhichTest,
        TestedNumber, TestResult, Residue,
        PRPingProgram, ProvingProgram,
        PRPingProgramVersion, ProvingProgramVersion,
        SecondsForTest, CheckedGFNDivisibility
	) VALUES (
		candidate, candidateTestId, 0, 'Main',
        candidate, 2, 'PRIME',
        'llr64.exe', 'llr64.exe', '3.8.16', '3.8.16',
        0, 0
	);

    INSERT INTO UserPrimes (
		UserID, CandidateName, TestedNumber, TestResult,
        MachineID, InstanceID, TeamID,
        DecimalLength, DateReported, ShowOnWebPage
    ) VALUES (
		'MischaR', candidate, candidate, 2,
        'Manual', '1', 'Antarctic_Crunchers',
        _decimalLength, UNIX_TIMESTAMP(NOW()), 1
    );
END //

DELIMITER ;
