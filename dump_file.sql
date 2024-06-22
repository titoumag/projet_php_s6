--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3 (Homebrew)
-- Dumped by pg_dump version 16.3 (Homebrew)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: read_only; Type: SCHEMA; Schema: -; Owner: user_owner
--

CREATE SCHEMA read_only;


ALTER SCHEMA read_only OWNER TO user_owner;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cours; Type: TABLE; Schema: read_only; Owner: user_owner
--

CREATE TABLE read_only.cours (
    id_cours integer NOT NULL,
    matiere character varying(20),
    professeur character varying(20)
);


ALTER TABLE read_only.cours OWNER TO user_owner;

--
-- Name: cours_id_cours_seq; Type: SEQUENCE; Schema: read_only; Owner: user_owner
--

CREATE SEQUENCE read_only.cours_id_cours_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE read_only.cours_id_cours_seq OWNER TO user_owner;

--
-- Name: cours_id_cours_seq; Type: SEQUENCE OWNED BY; Schema: read_only; Owner: user_owner
--

ALTER SEQUENCE read_only.cours_id_cours_seq OWNED BY read_only.cours.id_cours;


--
-- Name: etudiant; Type: TABLE; Schema: read_only; Owner: user_owner
--

CREATE TABLE read_only.etudiant (
    id_etudiant integer NOT NULL,
    prenom character varying(20),
    nom character varying(20)
);


ALTER TABLE read_only.etudiant OWNER TO user_owner;

--
-- Name: etudiant_id_etudiant_seq; Type: SEQUENCE; Schema: read_only; Owner: user_owner
--

CREATE SEQUENCE read_only.etudiant_id_etudiant_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE read_only.etudiant_id_etudiant_seq OWNER TO user_owner;

--
-- Name: etudiant_id_etudiant_seq; Type: SEQUENCE OWNED BY; Schema: read_only; Owner: user_owner
--

ALTER SEQUENCE read_only.etudiant_id_etudiant_seq OWNED BY read_only.etudiant.id_etudiant;


--
-- Name: cours id_cours; Type: DEFAULT; Schema: read_only; Owner: user_owner
--

ALTER TABLE ONLY read_only.cours ALTER COLUMN id_cours SET DEFAULT nextval('read_only.cours_id_cours_seq'::regclass);


--
-- Name: etudiant id_etudiant; Type: DEFAULT; Schema: read_only; Owner: user_owner
--

ALTER TABLE ONLY read_only.etudiant ALTER COLUMN id_etudiant SET DEFAULT nextval('read_only.etudiant_id_etudiant_seq'::regclass);


--
-- Data for Name: cours; Type: TABLE DATA; Schema: read_only; Owner: user_owner
--

COPY read_only.cours (id_cours, matiere, professeur) FROM stdin;
1	php	robert
2	admin_bdd	taffo
3	optimisation	salomon
4	springboot	domas
\.


--
-- Data for Name: etudiant; Type: TABLE DATA; Schema: read_only; Owner: user_owner
--

COPY read_only.etudiant (id_etudiant, prenom, nom) FROM stdin;
1	aurelien	guillou
2	thomas	chu
3	titouan	magnin
4	baptiste	laval
\.


--
-- Name: cours_id_cours_seq; Type: SEQUENCE SET; Schema: read_only; Owner: user_owner
--

SELECT pg_catalog.setval('read_only.cours_id_cours_seq', 4, true);


--
-- Name: etudiant_id_etudiant_seq; Type: SEQUENCE SET; Schema: read_only; Owner: user_owner
--

SELECT pg_catalog.setval('read_only.etudiant_id_etudiant_seq', 4, true);


--
-- Name: cours cours_pkey; Type: CONSTRAINT; Schema: read_only; Owner: user_owner
--

ALTER TABLE ONLY read_only.cours
    ADD CONSTRAINT cours_pkey PRIMARY KEY (id_cours);


--
-- Name: etudiant etudiant_pkey; Type: CONSTRAINT; Schema: read_only; Owner: user_owner
--

ALTER TABLE ONLY read_only.etudiant
    ADD CONSTRAINT etudiant_pkey PRIMARY KEY (id_etudiant);


--
-- Name: SCHEMA read_only; Type: ACL; Schema: -; Owner: user_owner
--

GRANT USAGE ON SCHEMA read_only TO read_only;


--
-- Name: TABLE cours; Type: ACL; Schema: read_only; Owner: user_owner
--

GRANT SELECT ON TABLE read_only.cours TO read_only;


--
-- Name: SEQUENCE cours_id_cours_seq; Type: ACL; Schema: read_only; Owner: user_owner
--

GRANT SELECT ON SEQUENCE read_only.cours_id_cours_seq TO read_only;


--
-- Name: TABLE etudiant; Type: ACL; Schema: read_only; Owner: user_owner
--

GRANT SELECT ON TABLE read_only.etudiant TO read_only;


--
-- Name: SEQUENCE etudiant_id_etudiant_seq; Type: ACL; Schema: read_only; Owner: user_owner
--

GRANT SELECT ON SEQUENCE read_only.etudiant_id_etudiant_seq TO read_only;


--
-- Name: DEFAULT PRIVILEGES FOR SEQUENCES; Type: DEFAULT ACL; Schema: read_only; Owner: user_owner
--

ALTER DEFAULT PRIVILEGES FOR ROLE user_owner IN SCHEMA read_only GRANT SELECT ON SEQUENCES TO read_only;


--
-- Name: DEFAULT PRIVILEGES FOR SEQUENCES; Type: DEFAULT ACL; Schema: read_only; Owner: read_only
--

ALTER DEFAULT PRIVILEGES FOR ROLE read_only IN SCHEMA read_only GRANT SELECT ON SEQUENCES TO read_only;


--
-- Name: DEFAULT PRIVILEGES FOR TABLES; Type: DEFAULT ACL; Schema: read_only; Owner: user_owner
--

ALTER DEFAULT PRIVILEGES FOR ROLE user_owner IN SCHEMA read_only GRANT SELECT ON TABLES TO read_only;


--
-- Name: DEFAULT PRIVILEGES FOR TABLES; Type: DEFAULT ACL; Schema: read_only; Owner: read_only
--

ALTER DEFAULT PRIVILEGES FOR ROLE read_only IN SCHEMA read_only GRANT SELECT ON TABLES TO read_only;


--
-- PostgreSQL database dump complete
--

