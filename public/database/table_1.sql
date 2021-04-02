-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 04:16 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai`
--

-- --------------------------------------------------------

--
-- Table structure for table `table 1`
--

CREATE TABLE `table 1` (
  `CASENUM` bigint(20) DEFAULT NULL,
  `MDLYR_IM` int(4) DEFAULT NULL,
  `HITRUN_IM` varchar(3) DEFAULT NULL,
  `BDYTYP_IM` varchar(80) DEFAULT NULL,
  `PCRASH1_IM` varchar(58) DEFAULT NULL,
  `IMPACT1_IM` varchar(33) DEFAULT NULL,
  `VEHNO` int(2) DEFAULT NULL,
  `VEVENT_IM` varchar(86) DEFAULT NULL,
  `MXVSEV_IM` varchar(24) DEFAULT NULL,
  `NUMINJ_IM` varchar(28) DEFAULT NULL,
  `V_ALCH_IM` varchar(16) DEFAULT NULL,
  `VIN` varchar(12) DEFAULT NULL,
  `WEIGHT` float(20) DEFAULT NULL,
  `HAZ_ID` varchar(14) DEFAULT NULL,
  `MODEL_YR` varchar(12) DEFAULT NULL,
  `DZIPCODE` varchar(33) DEFAULT NULL,
  `MCARR_ID` varchar(14) DEFAULT NULL,
  `REGION` varchar(9) DEFAULT NULL,
  `HIT_RUN` varchar(12) DEFAULT NULL,
  `MAKE` varchar(32) DEFAULT NULL,
  `BODY_TYP` varchar(80) DEFAULT NULL,
  `SPEC_USE` varchar(26) DEFAULT NULL,
  `EMER_USE` varchar(12) DEFAULT NULL,
  `TOW_VEH` varchar(39) DEFAULT NULL,
  `JACKNIFE` varchar(25) DEFAULT NULL,
  `FIRE_EXP` varchar(18) DEFAULT NULL,
  `VTRAFCON` varchar(60) DEFAULT NULL,
  `DEFORMED` varchar(17) DEFAULT NULL,
  `TOWED` varchar(33) DEFAULT NULL,
  `P_CRASH1` varchar(58) DEFAULT NULL,
  `ACC_TYPE` varchar(63) DEFAULT NULL,
  `IMPACT1` varchar(33) DEFAULT NULL,
  `P_CRASH3` varchar(45) DEFAULT NULL,
  `PCRASH4` varchar(54) DEFAULT NULL,
  `PCRASH5` varchar(55) DEFAULT NULL,
  `TRAV_SP` varchar(15) DEFAULT NULL,
  `ROLLOVER` varchar(28) DEFAULT NULL,
  `CARGO_BT` varchar(30) DEFAULT NULL,
  `HAZ_PLAC` varchar(14) DEFAULT NULL,
  `HAZ_REL` varchar(14) DEFAULT NULL,
  `DR_PRES` varchar(32) DEFAULT NULL,
  `SPEEDREL` varchar(39) DEFAULT NULL,
  `VSURCOND` varchar(23) DEFAULT NULL,
  `VPROFILE` varchar(20) DEFAULT NULL,
  `VALIGN` varchar(24) DEFAULT NULL,
  `VTRAFWAY` varchar(53) DEFAULT NULL,
  `V_EVENT` varchar(86) DEFAULT NULL,
  `VEH_ALCH` varchar(18) DEFAULT NULL,
  `MAX_VSEV` varchar(24) DEFAULT NULL,
  `STRATUM` varchar(29) DEFAULT NULL,
  `NUMOCCS` int(2) DEFAULT NULL,
  `ROLINLOC` varchar(21) DEFAULT NULL,
  `HAZ_INV` varchar(3) DEFAULT NULL,
  `HAZ_CNO` varchar(62) DEFAULT NULL,
  `VTCONT_F` varchar(42) DEFAULT NULL,
  `IMPACT2` varchar(33) DEFAULT NULL,
  `BUS_USE` varchar(33) DEFAULT NULL,
  `V_CONFIG` varchar(56) DEFAULT NULL,
  `MHENUM` int(2) DEFAULT NULL,
  `MODEL` int(3) DEFAULT NULL,
  `NUM_INJV` varchar(28) DEFAULT NULL,
  `OCC_INVL` int(2) DEFAULT NULL,
  `P_CRASH2` varchar(90) DEFAULT NULL,
  `PJ` int(3) DEFAULT NULL,
  `PSU` int(2) DEFAULT NULL,
  `PSUSTRAT` int(2) DEFAULT NULL,
  `VNUM_LAN` varchar(19) DEFAULT NULL,
  `VSPD_LIM` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
