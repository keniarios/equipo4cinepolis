--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.5

-- Started on 2018-10-28 16:58:26

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2845 (class 0 OID 0)
-- Dependencies: 2844
-- Name: DATABASE "CINEPOLIS"; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE "CINEPOLIS" IS 'Para fines estudiantiles';


--
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2847 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 200 (class 1259 OID 16474)
-- Name: peliculas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.peliculas (
    id_pelicula integer NOT NULL,
    imagen text,
    titulo text,
    paisorigen text,
    anoestreno text,
    clasificacion text,
    duracion text,
    genero text,
    linktrailer text,
    sinopsis text,
    actores text,
    directores text,
    idiomaespanol integer,
    idiomaingles integer,
    subtituloespanol integer,
    subtituloingles integer,
    pelicula3d integer,
    idiomaespanol3d integer,
    idiomaingles3d integer,
    subtituloespanol3d integer,
    subtituloingles3d integer,
    estadoorigen text,
    estatus integer,
    rutavideo text
);


ALTER TABLE public.peliculas OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16472)
-- Name: peliculas_id_pelicula_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.peliculas_id_pelicula_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.peliculas_id_pelicula_seq OWNER TO postgres;

--
-- TOC entry 2848 (class 0 OID 0)
-- Dependencies: 199
-- Name: peliculas_id_pelicula_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.peliculas_id_pelicula_seq OWNED BY public.peliculas.id_pelicula;


--
-- TOC entry 198 (class 1259 OID 16426)
-- Name: prueba; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.prueba (
    foto text
);


ALTER TABLE public.prueba OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16536)
-- Name: registrocinepolisid; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.registrocinepolisid (
    id_cinepolisid integer NOT NULL,
    nombre text,
    apellidopaterno text,
    apellidomaterno text,
    correo text,
    contrasena text,
    tarjetaclub text,
    preguntaseguridad text,
    respuestapreguntaseguridad text,
    dianacimiento text,
    mesnacimiento text,
    anonacimiento text,
    lada text,
    telefono text
);


ALTER TABLE public.registrocinepolisid OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16534)
-- Name: registrocinepolisid_id_cinepolisid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.registrocinepolisid_id_cinepolisid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.registrocinepolisid_id_cinepolisid_seq OWNER TO postgres;

--
-- TOC entry 2849 (class 0 OID 0)
-- Dependencies: 203
-- Name: registrocinepolisid_id_cinepolisid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.registrocinepolisid_id_cinepolisid_seq OWNED BY public.registrocinepolisid.id_cinepolisid;


--
-- TOC entry 197 (class 1259 OID 16396)
-- Name: registropersonal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.registropersonal (
    id_registropersonal integer NOT NULL,
    numeroempleado text,
    nombre text,
    appaterno text,
    apmaterno text,
    correo text,
    contrasena text,
    telefono text,
    puesto text
);


ALTER TABLE public.registropersonal OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16394)
-- Name: registropersonal_id_registropersonal_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.registropersonal_id_registropersonal_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.registropersonal_id_registropersonal_seq OWNER TO postgres;

--
-- TOC entry 2850 (class 0 OID 0)
-- Dependencies: 196
-- Name: registropersonal_id_registropersonal_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.registropersonal_id_registropersonal_seq OWNED BY public.registropersonal.id_registropersonal;


--
-- TOC entry 202 (class 1259 OID 16515)
-- Name: slider; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.slider (
    id_slider integer NOT NULL,
    titulo text,
    rutaimagenbanner text,
    rutaimagenmovil text,
    rutaimagenmini text,
    posicion integer
);


ALTER TABLE public.slider OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16513)
-- Name: slider_id_slider_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.slider_id_slider_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.slider_id_slider_seq OWNER TO postgres;

--
-- TOC entry 2851 (class 0 OID 0)
-- Dependencies: 201
-- Name: slider_id_slider_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.slider_id_slider_seq OWNED BY public.slider.id_slider;


--
-- TOC entry 2698 (class 2604 OID 16477)
-- Name: peliculas id_pelicula; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.peliculas ALTER COLUMN id_pelicula SET DEFAULT nextval('public.peliculas_id_pelicula_seq'::regclass);


--
-- TOC entry 2700 (class 2604 OID 16539)
-- Name: registrocinepolisid id_cinepolisid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.registrocinepolisid ALTER COLUMN id_cinepolisid SET DEFAULT nextval('public.registrocinepolisid_id_cinepolisid_seq'::regclass);


--
-- TOC entry 2697 (class 2604 OID 16399)
-- Name: registropersonal id_registropersonal; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.registropersonal ALTER COLUMN id_registropersonal SET DEFAULT nextval('public.registropersonal_id_registropersonal_seq'::regclass);


--
-- TOC entry 2699 (class 2604 OID 16518)
-- Name: slider id_slider; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.slider ALTER COLUMN id_slider SET DEFAULT nextval('public.slider_id_slider_seq'::regclass);


--
-- TOC entry 2834 (class 0 OID 16474)
-- Dependencies: 200
-- Data for Name: peliculas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.peliculas (id_pelicula, imagen, titulo, paisorigen, anoestreno, clasificacion, duracion, genero, linktrailer, sinopsis, actores, directores, idiomaespanol, idiomaingles, subtituloespanol, subtituloingles, pelicula3d, idiomaespanol3d, idiomaingles3d, subtituloespanol3d, subtituloingles3d, estadoorigen, estatus, rutavideo) FROM stdin;
15	img/cartelera/28795.jpg	Te Juro Que Yo No Fui	México	2018-10-26	B	84	Comedia Romantica	https://www.youtube.com/watch?v=2mVmOV_5ryM	Ludwig, talentoso contrabajista, se involucra accidentalmente con Rebecca, seductora española, a quien ayuda a escapar de dos árabes que la persiguen porque quieren robarle un valioso diamante, en el paradisíaco Cancún. La persecución se vuelve un tremendo enredo porque la celosísima esposa de Ludwig y una chiflada ex novia extranjera aparecen en el lugar. Al final, el apabullado músico descubre que de quién se ha enamorado y a quien ha estado ayudando todo ese tiempo, es en realidad una ladrona de joyas, quien no es española sino mexicana, y que ella ha sido quien les ha robado el diamante a los árabes.	Ariadne Díaz,maría Aura,mauricio Ochmann,marta Hazas	Joaquín Bissner	1	0	0	1	0	0	0	0	0	Te Juro Que Yo No Fui	2	videotrailers/28795.mp4
13	img/cartelera/28607.jpg	Escalofríos 2: Una Noche Embrujada	Usa	2018-11-22	A	90	Comedia Romantica	https://www.youtube.com/watch?v=j0KY6Mr_Cqk	Halloween vuelve a la vida en una nueva comedia y aventura basada en la serie de libros de R.L. Stine’s que ha vendido más de 400 millones de ejemplares.	Wendi Mclendon-Covey,ken Jeong,chris Parnell,jeremy Ray Taylor,caleel Harris,madison Iseman	Ari Sandel	0	0	0	1	0	0	0	0	0	Goosebumps 2: Haunted Halloween	3	videotrailers/28607.mp4
6	img/cartelera/HALLOWEEN.jpg	Halloween	Estados Unidos	2018-10-18	B15	116	Terror	https://www.youtube.com/watch?v=sVBa5hNZFHM	Laurie Strode (Jamie Lee Curtis), quién logró escapar de su matanza en la noche de Halloween hace cuatro décadas, llegará a su confrontación final con esta terrorífica figura enmascarada.	Judy Greer,jamie Lee Curtis,miles Robbins,nick Castle	David Gordon Green	1	0	1	1	1	1	0	1	0	Halloween	1	videotrailers/13775.mp4
16	img/cartelera/27934.jpg	Ni Tú Ni Yo	México	2018-10-23	B	98	Comedia Romantica	https://www.youtube.com/watch?v=3pvRLh_KdqQ	Guadalupe Martínez “El Halcón Negro”, era el luchador más famoso del país, gracias al apoyo de su hermano Gabino “El Conejo”. Pero llevaban años separados por las adicciones de El Conejo. Cuando El Conejo vuelve para reconectar con su familia, hace que El Halcón Negro pierda la pelea más importante de su carrera. Cuando todo parece perdido Miranda, la dueña de la lucha independiente, les ofrece la oportunidad de su vida, con la condición de que trabajen nuevamente juntos. Al comenzar a trabajar juntos se darán cuenta de que las cosas no son como les habían prometido y que tendrán que trabajar en equipo para recuperar su nombre y prestigio.	Mauricio Argüelles,césar Rodríguez,bárbara Del Regil	Noé Santillán-López	0	0	0	1	0	0	0	0	0	Ni Tú Ni Yo	1	videotrailers/27934.mp4
12	img/cartelera/venom.jpg	Venom	Estados Unidos	2018-10-26	B	112	Acción	https://www.youtube.com/watch?v=xLCn88bfW1o	Uno de los personajes más enigmáticos, complejos y violentos de Marvel llega a la gran pantalla interpretado por Tom Hardy, actor nominado a un Premio de la Academia®, como el mortífero protector Venom.	Reid Scott,scott Haze,michelle Williams,tom Hardy,riz Ahmed	Ruben Fleischer	1	0	0	0	1	0	0	1	0	Venom	2	videotrailers/27870.mp4
14	img/cartelera/29406.jpg	La Otra Parte:la Historia No Contada Del Narco	México	2018-12-13	B	98	Suspenso	https://www.youtube.com/watch?v=dy9eEz91tXc	Largometraje documental basado en hechos reales, revela la otra cara de la industria del narcotráfico; aquella que dista de ser heróica, épica y redituable. De la mano del hijo del mentor de dos de los narcotraficantes más grandes de la historia, la película presenta los mitos y realidades de esta "subcultura" que tan sólo en México, en seis años ha dejado más de 180,000 muertos y 50,000 niños en estado de orfandad.		Ricardo Colorado Seira	1	0	0	0	0	0	0	0	0	La Otra Parte:la Historia No Contada	3	videotrailers/29406.mp4
19	img/cartelera/28057.jpg	Tiempo Compartido	México	2019-01-24	B	96	Drama	https://www.youtube.com/watch?v=WqJhm6pJZ5k	Dos hombres de familia atormentados – un huésped y un empleado de limpieza– unen fuerzas para rescatar a sus familias del paraíso, convencidos de que Everfields International, la siniestra administración del mega resort tropical Vista Mar, quiere quitarles a sus seres queridos.	Cassandra Ciangherotti,miguel Rodarte,luis Gerardo Méndez	Sebastián Hofmann	1	0	1	0	0	0	0	0	0	Tiempo Compartido	3	videotrailers/28057.mp4
18	img/cartelera/28651.jpg	Re-Estreno Coco	Estados Unidos	2018-11-02	A	105	Infantil	https://www.youtube.com/watch?v=bOIHSSBIXZE	A pesar de la incomprensible prohibición de la música desde hace varias generaciones en su familia, Miguel sueña con convertirse en un músico consagrado, como su ídolo Ernesto de la Cruz (voz original en inglés de Benjamín Bratt). Desesperado por probar su talento, Miguel se encuentra en la impresionante y colorida Tierra de los Muertos como resultado de una misteriosa cadena de eventos. En el camino, encuentra al simpático timador Héctor (voz original en inglés de Gael García Bernal), y juntos se embarcan en una extraordinaria travesía para develar la verdadera razón detrás de la historia familiar de Miguel.	Gael García Bernal,anthony Gonzalez	Lee Unkrich	1	0	0	0	0	0	0	0	0	Coco	3	videotrailers/coco.mp4
11	img/cartelera/SiYoFueraTu.jpg	Si Yo Fuera Tú	México	2018-10-20	B	95	Comedia	https://www.youtube.com/watch?v=sGhYfqCCeBQ	La historia de Claudia y Antonio, quienes están casados desde hace 15 años, sin embargo, su relación se ha vuelto rutinaria. Después de una discusión nocturna, el inusual alineamiento de los planetas Venus, Tierra y Marte provoca una mágica transformación: resulta que el alma de Antonio queda atrapada en el cuerpo de Claudia y viceversa.	Juan Manuel Bernal,daniel Giménez Cacho,isela Vega,sophie Alexander-Katz,sebastián Zurita,rosa María Bianchi	Alejandro Lubezki	1	0	0	0	1	0	0	0	0	Si Yo Fuera Tú	1	videotrailers/28060.mp4
20	img/cartelera/29050.jpg	Bohemian Rhapsody, La Historia De Freddie Mercury	Estados Unidos	2019-01-31	B15	120	Drama	www.youtube.com/watch?v=mP0VHJYFOAU	“Bohemian Rhapsody, La historia de Freddie Mercury” es una celebración trepidante de Queen, su música y su extraordinario cantante principal Freddie Mercury, quien desafió estereotipos y destruyó convenciones para convertirse en uno de los artistas más queridos del mundo. La película sigue el ascenso meteórico de la banda a través de sus canciones icónicas y su sonido revolucionario, de su inminente implosión una vez que el estilo de vida de Mercury se sale de control, y de su reunión triunfante en vísperas de Live Aid, donde Mercury, quien enfrentaba una enfermedad terminal, lidera la banda en una de las presentaciones más grandiosas en la historia de la música rock. Y, en el proceso, la consolidación del legado de una banda que siempre fue más como una familia, y que continúa inspirando a marginados, soñadores y melómanos hasta la fecha.	Allen Leech,mike Myers,tom Hollander,aidan Gillen,rami Malek,lucy Boynton,joseph Mazzello,ben Hardy,gwilym Lee	Bryan Singer	0	0	1	0	0	0	0	0	0	Bohemian Rhapsody	2	videotrailers/27824.mp4
21	img/cartelera/28058.jpg	El Jefe De La Mafia, Gotti	Estados Unidos	2018-10-24	B15	110	Crimen	www.youtube.com/watch?v=t9Kg4yObpuQ	La película sigue al ascenso del más peligroso y más temido jefe de la mafia John Gotti (John Travolta) hasta convertirse en el gangster más peligroso de esta generación. Abarcando tres décadas y relatada por su hijo John Jr. (Spencer Lofranco), la película lleva a la pantalla la vida tumultuosa de Gotti y su esposa (Kelly Preston) que intenta mantener unida a la familia ante la tragedia y múltiples condenas de prisión.	John Travolta,kelly Preston,stacy Keach,spencer Lofranco,pruitt Taylor Vince,chris Mulkey,william Demeo	Kevin Connolly	0	0	1	0	1	0	0	1	0	Gotti	2	videotrailers/gotti.mp4
24	img/cartelera/27868.jpg	Locamente Millonarios	Estados Unidos	2018-12-20	B	120	Comedia	Vacio	La historia relata el viaje que Rachel Chu (Wu) hace de Nueva York a Singapur, para acompañar a su novio, Nick Young (Golding), a la boda de su mejor amigo. Rachel está emocionada por viajar por primera vez a Asia, pero también está nerviosa porque conocerá a la familia de Nick... y se siente poco preparada cuando él le confiesa que olvidó mencionar pequeños detalles sobre su origen: resulta que Nick no es solamente el heredero de la fortuna de la familia más poderosa y millonaria de Singapur, sino también es el soltero más codiciado de la región. Ir del brazo de Nick la convierte en el blanco de la furia de mujeres celosas que desaprueban la relación; pero la peor es la madre de Nick (Yeoh). Y cada vez queda más claro que si bien el dinero no puede comprar el amor verdadero, sí puede complicar mucho las cosas.	Constance Wu,henry Golding,awkwafina .,gemma Chan,michelle Yeoh	Jon M. Chu	0	0	1	0	0	0	0	0	0	Crazy Rich Asians	1	videotrailers/M27868.mp4
\.


--
-- TOC entry 2832 (class 0 OID 16426)
-- Dependencies: 198
-- Data for Name: prueba; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.prueba (foto) FROM stdin;
../img/cartelera/venom.jpg
../img/cartelera/venom.jpg
../img/cartelera/monja.jpg
../img/cartelera/monja.jpg
\.


--
-- TOC entry 2838 (class 0 OID 16536)
-- Dependencies: 204
-- Data for Name: registrocinepolisid; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.registrocinepolisid (id_cinepolisid, nombre, apellidopaterno, apellidomaterno, correo, contrasena, tarjetaclub, preguntaseguridad, respuestapreguntaseguridad, dianacimiento, mesnacimiento, anonacimiento, lada, telefono) FROM stdin;
1	Roque	Heras	Vega	ROQUE@GMAIL.COM	$2y$10$WkfZCjuxxwborevs4axDBeL9dMdNRNNwDz0OOsHFfiaq1hBNC/l4W	12345	¿De qué modelo era tu primer auto?	Ferrari	1	1	1993	123	45678900
\.


--
-- TOC entry 2831 (class 0 OID 16396)
-- Dependencies: 197
-- Data for Name: registropersonal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.registropersonal (id_registropersonal, numeroempleado, nombre, appaterno, apmaterno, correo, contrasena, telefono, puesto) FROM stdin;
6	87654321	Kenia	Rios	Diarte	KENIA@HOTMAIL.COM	$2y$10$g409OaYJ.HrZeSxdxkgAQuVSZo9Qns4HoTN5v4euljS1FJX3KrESq	6673899809	SUPERVISOR
5	12345678	Roque	Heras	Vega	ROQUE@HOTMAIL.COM	$2y$10$g409OaYJ.HrZeSxdxkgAQuVSZo9Qns4HoTN5v4euljS1FJX3KrESq	6673899876	STAFF
\.


--
-- TOC entry 2836 (class 0 OID 16515)
-- Dependencies: 202
-- Data for Name: slider; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.slider (id_slider, titulo, rutaimagenbanner, rutaimagenmovil, rutaimagenmini, posicion) FROM stdin;
1	Bohemian Rhapsody	img/vistaCliente/slider/banner/2018101910251117-prin.jpg	img/vistaCliente/slider/movil/2018101910251117-movil.jpg	img/vistaCliente/slider/miniSlider/2018101910251117-thumb.png	2
2	Venom	img/vistaCliente/slider/banner/20181011173918772-prin.jpg	img/vistaCliente/slider/movil/20181011173918772-movil.jpg	img/vistaCliente/slider/miniSlider/201810313581508-thumb.png	3
3	Re-Estreno Coco	img/vistaCliente/slider/banner/20181012145845773-prin.jpg	img/vistaCliente/slider/movil/20181012145845773-movil.jpg	img/vistaCliente/slider/miniSlider/20181012145845773-thumb.png	1
\.


--
-- TOC entry 2852 (class 0 OID 0)
-- Dependencies: 199
-- Name: peliculas_id_pelicula_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.peliculas_id_pelicula_seq', 24, true);


--
-- TOC entry 2853 (class 0 OID 0)
-- Dependencies: 203
-- Name: registrocinepolisid_id_cinepolisid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.registrocinepolisid_id_cinepolisid_seq', 1, true);


--
-- TOC entry 2854 (class 0 OID 0)
-- Dependencies: 196
-- Name: registropersonal_id_registropersonal_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.registropersonal_id_registropersonal_seq', 6, true);


--
-- TOC entry 2855 (class 0 OID 0)
-- Dependencies: 201
-- Name: slider_id_slider_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.slider_id_slider_seq', 4, true);


--
-- TOC entry 2704 (class 2606 OID 16482)
-- Name: peliculas peliculas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.peliculas
    ADD CONSTRAINT peliculas_pkey PRIMARY KEY (id_pelicula);


--
-- TOC entry 2708 (class 2606 OID 16544)
-- Name: registrocinepolisid registrocinepolisid_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.registrocinepolisid
    ADD CONSTRAINT registrocinepolisid_pkey PRIMARY KEY (id_cinepolisid);


--
-- TOC entry 2702 (class 2606 OID 16404)
-- Name: registropersonal registropersonal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.registropersonal
    ADD CONSTRAINT registropersonal_pkey PRIMARY KEY (id_registropersonal);


--
-- TOC entry 2706 (class 2606 OID 16523)
-- Name: slider slider_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.slider
    ADD CONSTRAINT slider_pkey PRIMARY KEY (id_slider);


-- Completed on 2018-10-28 16:58:30

--
-- PostgreSQL database dump complete
--

