create table Member (
    Member_ID number(6) primary key, 
    Name varchar(30) NOT NULL,
    Gender Varchar(6), 
    Age number(3) NOT NULL,
    BMI number(2),
    height number(3) NOT NULL, 
    weight number(3) NOT NULL,
    activity varchar(60), 
    MCAL Number(4),
    DietPlanID Varchar(6),
    WorkoutPlanID Varchar(6),
    constraint diet_idfk Foreign key(DietPlanID) references DietPlan (DietPlanID),
    constraint work_idfk Foreign key(WorkoutPlanID) references WorkoutPlan (WorkoutPlanID)
);

create table Users (
    Member_ID Number(6) primary key,
    Password varchar(30) NOT NULL,
    State Varchar(8),
    constraint mem_idfk Foreign key(Member_ID) references Member (Member_ID)
);

create table DietPlan (
    DietPlanID Varchar(6) primary key,
    TargetCal Number(5),
    CALCOUNT Number(5),
    FoodID Varchar(6),
    constraint food_idfk Foreign key(FoodID) references Food (FoodID)
);

create table WorkoutPlan (
    WorkoutPlanID Varchar(6) primary key,
    Time Number(3), 
    BURNCAL Number(4),
    MUS_NAME Varchar(20),
    EXE_NAME Varchar(20),
    constraint mus2_idfk Foreign key(MUS_NAME) references MuscleGroup (MUS_NAME),
    constraint exe2_idfk Foreign key(EXE_NAME) references Exercise (EXE_NAME)
);

create table DailyLog(
    EX_DONE Varchar(4),
    Intake NUMBER(6),
    LogDate DATE,
    CALSTATUS Varchar(20),
    DietPlanID Varchar(6),
    WorkoutPlanID Varchar(6),
    Member_ID Number(6),
    constraint dietp_idfk Foreign key(DietPlanID) references DietPlan (DietPlanID),
    constraint workp_idfk Foreign key(WorkoutPlanID) references WorkoutPlan (WorkoutPlanID),
    Constraint log_Mem_PK Primary Key(LogDate, Member_ID)
);

create table Food(
    FoodID Varchar(6) primary key,
    FoodType varchar(20),
    Food_Name varchar(20),
    NUTID Varchar(6),
    constraint nut_idfk Foreign key (NUTID) references Nutrition (NUTID)
);

create table Nutrition(
    NUTID Varchar(6) primary key,
    Proteins number(6),
    Fats number(6),
    Carbohydrates number(6)
);

create table MuscleGroup(
    MUS_NAME VARCHAR(20) primary key,
    MUS_TYPE VARCHAR(20),
    MASS Number(4)
);

create table Exercise(
    EXE_NAME VARCHAR(20) primary key,
    EXE_TYPE VARCHAR(20),
    Reps Number(4)
);

create table Info(
    MUS_NAME Varchar(20),
    EXE_NAME Varchar(20),
    constraint mus_idfk Foreign key(MUS_NAME) references MuscleGroup (MUS_NAME),
    constraint exe_idfk Foreign key(EXE_NAME) references Exercise (EXE_NAME),
    Constraint MUS_EXE_PK Primary Key(MUS_NAME, EXE_NAME)
);

--Registration Query
"insert into MEMBER (Member_ID, Name, Gender, Age, height, weight) ".
"values('seq_member.nextval','".$_POST["Name"].",".$_POST["Gender"]."','".$_POST["Age"]."','".$_POST["height"]."','".$_POST["weight"].")";


--Daily intake form
"insert into WorkoutPlan (Member_ID, Name, Gender, Age, height, weight) ".
"values('".$_POST["Member_ID"]."','".$_POST["Name"].",".$_POST["Gender"]."','".$_POST["Age"]."','".$_POST["height"]."','".$_POST["weight"].")";

--Workout form
"insert into WorkoutPlan (Member_ID, Name, Gender, Age, height, weight) ".
"values('".$_POST["Member_ID"]."','".$_POST["Name"].",".$_POST["Gender"]."','".$_POST["Age"]."','".$_POST["height"]."','".$_POST["weight"].")";

--Display Diet Plans 
"select d.TargetCal, d.CALCOUNT, F.FoodType, F.Food_Name, N.Proteins, N.Fats ".
"From d.DietPlan join F.Food ".
"on D.FoodID = F.FoodID ".
"join N.Nutrition ".
"on F.NUTID = N.NUTID";

--Display WorkoutPlans
"select Time, Burncal, MUS_NAME, MUS_TYPE, MASS, EXE_NAME, EXE_TYPE, REPS ".
"From WorkoutPlan natural join MuscleGroup join Exercise";

--Procedure for sign in
Create or replace PROCEDURE SIGNIN (MID NUMBER, Pass VARCHAR) IS
    passw Users.password%type;
BEGIN
    Select PASSWORD into passw from USERS
    where Member_ID = MID;
    IF Passw = Pass THEN
        DBMS_OUTPUT.PUT_LINE('Login successful');
    ELSE 
        DBMS_OUTPUT.PUT_LINE('Incorrect Password or Member ID');
    END IF;
EXCEPTION
  WHEN NO_DATA_FOUND THEN
  DBMS_OUTPUT.PUT_LINE('Record not found');
END;
/
"exec SIGNIN (".$_POST["Member_ID"].", ".$_POST["Password"].")";

--Login form
"select PASSWORD from User ".
"where Member_ID = ".$_POST["Member_ID"];

CREATE SEQUENCE seq_nut1
MINVALUE 1
START WITH 200
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_food
MINVALUE 1
START WITH 300
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_diet
MINVALUE 1
START WITH 500
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_work
MINVALUE 1
START WITH 600
INCREMENT BY 1
CACHE 10;

Create table dummy(
    Name varchar(30),
    Age number(3),
    Height number(3),
    Weight number(3),
    Gender Varchar(6)
);

$sql_select = "insert into member values(
        '{seq_member.nextval}',
        '{$_POST["NAME"]}',
        {$_POST["GENDER"]},
        '{$_POST["AGE"]}',
        '{$_POST["HEIGHT"]}',
        '{$_POST["WEIGHT"]}'
        '{$_POST["ACTIVITY"]}',
        '{$_POST["MCAL"]}',,)";

--insert queries
insert ALL 
into Nutrition Values('N-1', 100, 50, 10)
into Nutrition Values('N-2', 200, 60, 20)
into Nutrition Values('N-3', 300, 70, 30)
Select * from dual;

insert ALL 
into Food Values('F-1', 'Greens', 'Salad', 'N-1')
into Food Values('F-2', 'Meat', 'Steak', 'N-3')
into Food Values('F-3', 'Reds', 'Beans', 'N-2')
Select * from dual;

insert ALL 
into DietPlan Values('D-1', 10000, 3000, 'F-1')
into DietPlan Values('D-2', 5000, 300, 'F-3')
into DietPlan Values('D-3', 2000, 700, 'F-2')
Select * from dual;

delete from Exercise;
delete from MuscleGroup;
delete from Workoutplan;

insert ALL 
into Exercise Values('DonkeyCalf Raise', 'Lower Leg', 5)
into Exercise Values('SeatedCalf Raise', 'Lower Leg', 4)
into Exercise Values('Calf Raise', 'Lower Leg', 10)
into Exercise Values('Farmers Walk', 'Lower Leg', 5)
into Exercise Values('Sled Drag', 'Back of upper leg', 4)
into Exercise Values('Stiff-Leg', 'Back of upper leg', 10)
into Exercise Values('Single-Leg','Back of upper leg', 5)
into Exercise Values('AirSquat', 'Back of upper leg', 4)
into Exercise Values('HipThrust', 'Butt and Hips', 10)
into Exercise Values('FireHydrant', 'Butt and Hips', 5)
into Exercise Values('FrogPump', 'Butt and Hips', 4)
into Exercise Values('HammerCurl', 'Lower arms', 10)
into Exercise Values('ZottmanCurl', 'Top of shoulders', 5)
into Exercise Values('Chin-Up', 'Top of shoulders', 4)
into Exercise Values('SeatedSprinter', 'under the armpits', 10)
into Exercise Values('LatPull-Down', 'under the armpits', 10)
Select * from dual;

insert ALL 
into MuscleGroup Values('Calves', 'Lower Leg', 50)
into MuscleGroup Values('Hamstring', 'Back of upper leg', 100)
into MuscleGroup Values('Glutes', 'Butt and Hips', 150)
into MuscleGroup Values('Forearms', 'Lower arms', 150)
into MuscleGroup Values('Triceps', 'Back of upper arms', 150)
into MuscleGroup Values('Biceps', 'Front of upper arms', 150)
into MuscleGroup Values('Trapezius', 'Top of shoulders', 150)
into MuscleGroup Values('Latissiums', 'under the armpits', 150)
Select * from dual;


insert into workoutplan values(seq_work.nextval, 100, 300, 'Calves', 'Farmers Walk');
insert into workoutplan values(seq_work.nextval, 100, 300, 'Biceps', 'HammerCurl');
insert into workoutplan values(seq_work.nextval, 200, 500, 'Hamstring', 'Single-Leg');


alter table workoutplan modify muscle_id varchar(20);
alter table workoutplan modify exercise_id varchar(20);

--View all workout plans
Select * from WorkoutPlan w join exercise e on (w.exercise_id = e.exe_name) join musclegroup m on (w.muscle_id = m.mus_name);

--View all diet plans
Select * from DietPlan d join Food f on (d.foodid = f.foodid) join Nutrition n on (f.nutid = n.nutid);

--Report for diet plan target
SELECT *
FROM   (
    SELECT *
    FROM   DietPlan d join Food f on (d.foodid = f.foodid) join Nutrition n on (f.nutid = n.nutid)
    ORDER BY DBMS_RANDOM.RANDOM)
WHERE  rownum < 3;

--Report for getting fitter
SELECT *
FROM   (
    SELECT *
    FROM   WorkoutPlan
    ORDER BY DBMS_RANDOM.RANDOM)
WHERE  rownum < 3;

--Report personalized plan
SELECT *
FROM   (
    SELECT *
    FROM   DietPlan natural join WorkoutPlan
    ORDER BY DBMS_RANDOM.RANDOM)
WHERE  rownum < 3;

--Update Workoutplan
Update MEMBER
Set workoutplanID = " "
Where Member_id = " ";

--Update Dietplan
Update MEMBER
Set dietplanID = " "
Where Member_id = " ";

--Add new diet plan
--Get FoodID from this Select
SELECT FoodID
FROM   (
    SELECT *
    FROM   Food
    ORDER BY DBMS_RANDOM.RANDOM)
WHERE  rownum < 2; 

insert into DietPlan 
Values (seq_diet.nextval,"Targetcal", "Calcount", "FoodID")

--GetlastdietplanID
Select dietplanID from DietPlan;

Update MEMBER
Set dietplanID = "DietplanID"
Where Member_id = "MemberID";

--Add new workout plan
--Get Exercise_ID from this Select
SELECT EXE_NAME
FROM   (
    SELECT *
    FROM   Exercise
    ORDER BY DBMS_RANDOM.RANDOM)
WHERE  rownum < 2; 

--Get Muscle_ID from this Select
SELECT MUS_NAME
FROM   (
    SELECT *
    FROM  MuscleGroup
    ORDER BY DBMS_RANDOM.RANDOM)
WHERE  rownum < 2; 

insert into WorkoutPlan 
Values (seq_work.nextval,"Time", "Burncal", "Muscle_ID", "Exercise_ID");

--For auto increment of workoutplanID

--Get last workoutplanID
Select workoutplanID from workoutPlan;

Update MEMBER
Set WorkoutplanID = "WorkoutplanID"
Where Member_id = "MemberID";

--Daily log form
--Get plan IDs from this query
select dietplanID, workoutPlan from member where member_id = "memberID";
--insert here
insert into DailyLog Values("Exercise_done", "Intake", SYSDATE, "Deficit", "dietplanID", "workoutplanID", "MemberID");

--Trigger during updating plans
 CREATE OR REPLACE TRIGGER DietPlanChange
AFTER UPDATE on Member
  FOR EACH ROW
DECLARE
    planid Varchar(6);
BEGIN
  select DietPlanID into planid from Member;
  DBMS_OUTPUT.PUT_LINE('NEW VALUE: '||:NEW.DietPlanID||' OLD VALUE: '||:OLD.DietPlanID);
END;
/

--Trigger during updating plans
 CREATE OR REPLACE TRIGGER WorkoutPlanChange
AFTER UPDATE on Member
  FOR EACH ROW
DECLARE
    planid Varchar(6);
BEGIN
  select WorkoutPlanID into planid from Member;
  DBMS_OUTPUT.PUT_LINE('NEW VALUE: '||:NEW.WorkoutPlanID||' OLD VALUE: '||:OLD.WorkoutPlanID);
END;
/

