--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: catalogo_producto; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE catalogo_producto (
    codigocatalogo character varying(2) NOT NULL,
    descripcioncatalogo character varying(60) NOT NULL,
    id integer NOT NULL,
    CONSTRAINT ctlcatalogoproducto_codigocatalogo_check CHECK (((codigocatalogo)::text ~ '^[0-9]{2}$'::text))
);


ALTER TABLE public.catalogo_producto OWNER TO admin;

--
-- Name: catalogo_producto_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE catalogo_producto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.catalogo_producto_id_seq OWNER TO admin;

--
-- Name: catalogo_producto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE catalogo_producto_id_seq OWNED BY catalogo_producto.id;


--
-- Name: catalogo_producto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('catalogo_producto_id_seq', 2, true);


--
-- Name: corr_item; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE corr_item
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.corr_item OWNER TO admin;

--
-- Name: corr_item; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('corr_item', 25431, true);


--
-- Name: especifico; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE especifico (
    codigoespecifico character varying(8) NOT NULL,
    descripcionespecifico character varying(500) NOT NULL,
    id_catalogo_producto integer,
    id_rubro integer,
    id integer NOT NULL,
    CONSTRAINT ctlespecifico_codigoespecifico_check CHECK (((codigoespecifico)::text ~ '^[0-9]{5,8}$'::text))
);


ALTER TABLE public.especifico OWNER TO admin;

--
-- Name: especifico_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE especifico_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.especifico_id_seq OWNER TO admin;

--
-- Name: especifico_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE especifico_id_seq OWNED BY especifico.id;


--
-- Name: especifico_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('especifico_id_seq', 412, true);


--
-- Name: fuente_financiamiento; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE fuente_financiamiento (
    codigofuente character varying(3) NOT NULL,
    descripcionfuente character varying(100) NOT NULL,
    id_origen_financiamiento integer,
    id integer NOT NULL,
    CONSTRAINT ctlfuentefinanciamiento_codigofuente_check CHECK (((codigofuente)::text ~ '^[0-9]{3}$'::text))
);


ALTER TABLE public.fuente_financiamiento OWNER TO admin;

--
-- Name: fuente_financiamiento_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE fuente_financiamiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.fuente_financiamiento_id_seq OWNER TO admin;

--
-- Name: fuente_financiamiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE fuente_financiamiento_id_seq OWNED BY fuente_financiamiento.id;


--
-- Name: fuente_financiamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('fuente_financiamiento_id_seq', 20, true);


--
-- Name: item; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE item (
    descripcionitem text NOT NULL,
    autorizado boolean DEFAULT false NOT NULL,
    descontinuado boolean DEFAULT false NOT NULL,
    preciounitario numeric(10,2),
    bloqueado boolean DEFAULT false,
    observaciones text,
    id_especifico integer,
    id integer NOT NULL,
    id_especifico_onu integer,
    id_unidad_medida integer,
    CONSTRAINT tblitem_preciounitario_check CHECK ((preciounitario >= (0)::numeric))
);


ALTER TABLE public.item OWNER TO admin;

--
-- Name: item_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.item_id_seq OWNER TO admin;

--
-- Name: item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE item_id_seq OWNED BY item.id;


--
-- Name: item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('item_id_seq', 23332, true);


--
-- Name: linea_plan; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE linea_plan (
    preciounitario numeric(11,2) NOT NULL,
    id integer NOT NULL,
    id_plan_compras integer,
    id_unidad_medida integer,
    id_item integer,
    cantidad_pedido integer,
    CONSTRAINT tbllineaplan_preciounitario_check CHECK ((preciounitario > (0)::numeric))
);


ALTER TABLE public.linea_plan OWNER TO admin;

--
-- Name: linea_plan_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE linea_plan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.linea_plan_id_seq OWNER TO admin;

--
-- Name: linea_plan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE linea_plan_id_seq OWNED BY linea_plan.id;


--
-- Name: linea_plan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('linea_plan_id_seq', 125576, true);


--
-- Name: linea_requerimiento; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE linea_requerimiento (
    preciounitario numeric(9,2) NOT NULL,
    especificaciones text,
    cantidad real NOT NULL,
    id_requerimiento integer,
    id_unidad_medida integer,
    id integer NOT NULL,
    id_item integer,
    CONSTRAINT tbllndetallerequerimiento_cantidad_check CHECK ((cantidad > (0)::double precision)),
    CONSTRAINT tbllndetallerequerimiento_preciounitario_check CHECK ((preciounitario > (0)::numeric))
);


ALTER TABLE public.linea_requerimiento OWNER TO admin;

--
-- Name: linea_requerimiento_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE linea_requerimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.linea_requerimiento_id_seq OWNER TO admin;

--
-- Name: linea_requerimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE linea_requerimiento_id_seq OWNED BY linea_requerimiento.id;


--
-- Name: linea_requerimiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('linea_requerimiento_id_seq', 31599, true);


--
-- Name: nivel; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE nivel (
    codigonivel character varying(2) NOT NULL,
    descripcionnivel character varying(30) NOT NULL,
    id integer NOT NULL,
    CONSTRAINT ctlnivel_codigonivel_check CHECK (((codigonivel)::text ~ '^[0-9]{2}$'::text))
);


ALTER TABLE public.nivel OWNER TO admin;

--
-- Name: nivel_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE nivel_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.nivel_id_seq OWNER TO admin;

--
-- Name: nivel_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE nivel_id_seq OWNED BY nivel.id;


--
-- Name: nivel_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('nivel_id_seq', 4, true);


--
-- Name: origen_financiamiento; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE origen_financiamiento (
    codigoorigen character varying(2) NOT NULL,
    descripcionorigen character varying(15) NOT NULL,
    id integer NOT NULL,
    CONSTRAINT ctlorigenfinanciamiento_codigoorigen_check CHECK ((((codigoorigen)::text = 'L'::text) OR ((codigoorigen)::text = 'E'::text)))
);


ALTER TABLE public.origen_financiamiento OWNER TO admin;

--
-- Name: origen_financiamiento_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE origen_financiamiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.origen_financiamiento_id_seq OWNER TO admin;

--
-- Name: origen_financiamiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE origen_financiamiento_id_seq OWNED BY origen_financiamiento.id;


--
-- Name: origen_financiamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('origen_financiamiento_id_seq', 2, true);


--
-- Name: pedido_producto; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE pedido_producto (
    numeropedido character varying(2) NOT NULL,
    mespedido character varying(2),
    cantidad real NOT NULL,
    id_linea_plan integer,
    id integer NOT NULL,
    CONSTRAINT tblpedidoproduc_cantidad_check CHECK ((cantidad >= (0)::double precision)),
    CONSTRAINT tblpedidoproduc_numeropedido_check CHECK (((numeropedido)::text ~ '^[0-9]{1,2}$'::text))
);


ALTER TABLE public.pedido_producto OWNER TO admin;

--
-- Name: pedido_producto_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE pedido_producto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.pedido_producto_id_seq OWNER TO admin;

--
-- Name: pedido_producto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE pedido_producto_id_seq OWNED BY pedido_producto.id;


--
-- Name: pedido_producto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('pedido_producto_id_seq', 356835, true);


--
-- Name: perfil_usuario; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE perfil_usuario (
    codigoperfil character varying(2) NOT NULL,
    descripcionperfil character varying(50) NOT NULL,
    id integer NOT NULL,
    CONSTRAINT ctlperfilusuario_codigoperfil_check CHECK (((codigoperfil)::text ~ '^[0-9]{2}$'::text))
);


ALTER TABLE public.perfil_usuario OWNER TO admin;

--
-- Name: perfil_usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE perfil_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.perfil_usuario_id_seq OWNER TO admin;

--
-- Name: perfil_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE perfil_usuario_id_seq OWNED BY perfil_usuario.id;


--
-- Name: perfil_usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('perfil_usuario_id_seq', 7, true);


--
-- Name: periodo_fiscal; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE periodo_fiscal (
    aniofiscal smallint NOT NULL,
    estaactivo boolean DEFAULT true NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.periodo_fiscal OWNER TO admin;

--
-- Name: periodo_fiscal_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE periodo_fiscal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.periodo_fiscal_id_seq OWNER TO admin;

--
-- Name: periodo_fiscal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE periodo_fiscal_id_seq OWNED BY periodo_fiscal.id;


--
-- Name: periodo_fiscal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('periodo_fiscal_id_seq', 4, true);


--
-- Name: plan_compras; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE plan_compras (
    numeroconvenio character varying(20),
    montoplan numeric(10,2) DEFAULT 0 NOT NULL,
    autorizado boolean DEFAULT false NOT NULL,
    fecha_autorizacion date,
    enviado boolean DEFAULT false NOT NULL,
    fecha_envio date,
    consolidado boolean DEFAULT false NOT NULL,
    modificaciones_hasta date,
    permisos character varying(5),
    id_fuente_financiamiento integer,
    id_subfuente_financiamiento integer,
    id integer NOT NULL,
    id_periodo_fiscal integer,
    id_unidad_solicitante integer,
    id_unidad_financiadora integer,
    numeroplan character varying(4) NOT NULL,
    CONSTRAINT tblplancompras_montoplan_check CHECK ((montoplan >= (0)::numeric))
);


ALTER TABLE public.plan_compras OWNER TO admin;

--
-- Name: COLUMN plan_compras.permisos; Type: COMMENT; Schema: public; Owner: admin
--

COMMENT ON COLUMN plan_compras.permisos IS 'cadena compuesta por alguno de los caracteres iab i=actualizar, a=actualizar, b=borrar';


--
-- Name: plan_compras_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE plan_compras_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.plan_compras_id_seq OWNER TO admin;

--
-- Name: plan_compras_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE plan_compras_id_seq OWNED BY plan_compras.id;


--
-- Name: plan_compras_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('plan_compras_id_seq', 587, true);


--
-- Name: requerimiento; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE requerimiento (
    numerorequerimiento character varying(5) NOT NULL,
    numerorequerimiento_xuni character varying(3) NOT NULL,
    numero_dictamentf character varying(4),
    fecharequerimiento date NOT NULL,
    montorequerimiento numeric(10,2) DEFAULT 0 NOT NULL,
    finalizado boolean DEFAULT false NOT NULL,
    observaciones text,
    fecha_entregado date,
    id integer NOT NULL,
    id_periodo_fiscal integer,
    id_unidad_solicitante integer,
    CONSTRAINT tblrequerimiento_montorequerimiento_check CHECK ((montorequerimiento >= (0)::numeric)),
    CONSTRAINT tblrequerimiento_numerorequerimiento_check CHECK (((numerorequerimiento)::text ~ '^[0-9]{5}$'::text))
);


ALTER TABLE public.requerimiento OWNER TO admin;

--
-- Name: requerimiento_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE requerimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.requerimiento_id_seq OWNER TO admin;

--
-- Name: requerimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE requerimiento_id_seq OWNED BY requerimiento.id;


--
-- Name: requerimiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('requerimiento_id_seq', 4960, true);


--
-- Name: rubro; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE rubro (
    codigorubro character varying(2) NOT NULL,
    descripcionrubro character varying(25) NOT NULL,
    id integer NOT NULL,
    CONSTRAINT ctlrubro_codigorubro_check CHECK (((codigorubro)::text ~ '^[0-9]{2}$'::text))
);


ALTER TABLE public.rubro OWNER TO admin;

--
-- Name: rubro_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE rubro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.rubro_id_seq OWNER TO admin;

--
-- Name: rubro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE rubro_id_seq OWNED BY rubro.id;


--
-- Name: rubro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('rubro_id_seq', 3, true);


--
-- Name: subfuente_financiamiento; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE subfuente_financiamiento (
    codigosubfuente character varying(3) NOT NULL,
    descripcionsubfuente character varying(50) NOT NULL,
    id_fuente_financiamiento integer,
    id integer NOT NULL,
    CONSTRAINT ctlsubfuentefinanc_codigosubfuente_check CHECK (((codigosubfuente)::text ~ '^[0-9]{3}$'::text))
);


ALTER TABLE public.subfuente_financiamiento OWNER TO admin;

--
-- Name: subfuente_financiamiento_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE subfuente_financiamiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.subfuente_financiamiento_id_seq OWNER TO admin;

--
-- Name: subfuente_financiamiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE subfuente_financiamiento_id_seq OWNED BY subfuente_financiamiento.id;


--
-- Name: subfuente_financiamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('subfuente_financiamiento_id_seq', 20, true);


--
-- Name: techo_presupuestario; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE techo_presupuestario (
    montoasignado numeric(10,2) NOT NULL,
    id_fuente_financiamiento integer,
    id_periodo_fiscal integer,
    id_unidad_solicitante integer,
    id_unidad_financiadora integer,
    id integer NOT NULL,
    CONSTRAINT tbltechopresup_montoasignado_check CHECK ((montoasignado > (0)::numeric))
);


ALTER TABLE public.techo_presupuestario OWNER TO admin;

--
-- Name: techo_presupuestario_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE techo_presupuestario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.techo_presupuestario_id_seq OWNER TO admin;

--
-- Name: techo_presupuestario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE techo_presupuestario_id_seq OWNED BY techo_presupuestario.id;


--
-- Name: techo_presupuestario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('techo_presupuestario_id_seq', 492, true);


--
-- Name: unidad_medida; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE unidad_medida (
    codigounidadmedida character varying(3) NOT NULL,
    descripcionunidadmedida character varying(50) NOT NULL,
    id integer NOT NULL,
    CONSTRAINT ctlunidadmedida_codigounidadmedida_check CHECK (((codigounidadmedida)::text ~ '^[0-9]{3}$'::text))
);


ALTER TABLE public.unidad_medida OWNER TO admin;

--
-- Name: unidad_medida_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE unidad_medida_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.unidad_medida_id_seq OWNER TO admin;

--
-- Name: unidad_medida_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE unidad_medida_id_seq OWNED BY unidad_medida.id;


--
-- Name: unidad_medida_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('unidad_medida_id_seq', 313, true);


--
-- Name: unidad_solicitante; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE unidad_solicitante (
    codigounidad character varying(10) NOT NULL,
    nombreunidad character varying(100) NOT NULL,
    realizaplan boolean DEFAULT true NOT NULL,
    realizaacta boolean DEFAULT false NOT NULL,
    realizaordencompra boolean DEFAULT false,
    id integer NOT NULL,
    id_nivel integer,
    id_unidad_superior integer
);


ALTER TABLE public.unidad_solicitante OWNER TO admin;

--
-- Name: unidad_solicitante_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE unidad_solicitante_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.unidad_solicitante_id_seq OWNER TO admin;

--
-- Name: unidad_solicitante_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE unidad_solicitante_id_seq OWNED BY unidad_solicitante.id;


--
-- Name: unidad_solicitante_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('unidad_solicitante_id_seq', 130, true);


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: admin; Tablespace: 
--

CREATE TABLE usuario (
    estaactivo boolean DEFAULT true NOT NULL,
    email character varying(150),
    id_perfil_usuario integer,
    id integer NOT NULL,
    id_unidad_solicitante integer,
    username character varying(255) NOT NULL,
    username_canonical character varying(255) NOT NULL,
    email_canonical character varying(255) NOT NULL,
    enabled boolean NOT NULL,
    algorithm character varying(255) NOT NULL,
    salt character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    last_login timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    locked boolean NOT NULL,
    expired boolean NOT NULL,
    expires_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    confirmation_token character varying(255) DEFAULT NULL::character varying,
    password_requested_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    roles text NOT NULL,
    credentials_expired boolean NOT NULL,
    credentials_expire_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);


ALTER TABLE public.usuario OWNER TO admin;

--
-- Name: COLUMN usuario.roles; Type: COMMENT; Schema: public; Owner: admin
--

COMMENT ON COLUMN usuario.roles IS '(DC2Type:array)';


--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO admin;

--
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE usuario_id_seq OWNED BY usuario.id;


--
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('usuario_id_seq', 187, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE catalogo_producto ALTER COLUMN id SET DEFAULT nextval('catalogo_producto_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE especifico ALTER COLUMN id SET DEFAULT nextval('especifico_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE item ALTER COLUMN id SET DEFAULT nextval('item_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE linea_plan ALTER COLUMN id SET DEFAULT nextval('linea_plan_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE linea_requerimiento ALTER COLUMN id SET DEFAULT nextval('linea_requerimiento_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE pedido_producto ALTER COLUMN id SET DEFAULT nextval('pedido_producto_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE perfil_usuario ALTER COLUMN id SET DEFAULT nextval('perfil_usuario_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE periodo_fiscal ALTER COLUMN id SET DEFAULT nextval('periodo_fiscal_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE plan_compras ALTER COLUMN id SET DEFAULT nextval('plan_compras_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE requerimiento ALTER COLUMN id SET DEFAULT nextval('requerimiento_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE rubro ALTER COLUMN id SET DEFAULT nextval('rubro_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE subfuente_financiamiento ALTER COLUMN id SET DEFAULT nextval('subfuente_financiamiento_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE techo_presupuestario ALTER COLUMN id SET DEFAULT nextval('techo_presupuestario_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE unidad_medida ALTER COLUMN id SET DEFAULT nextval('unidad_medida_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE unidad_solicitante ALTER COLUMN id SET DEFAULT nextval('unidad_solicitante_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE usuario ALTER COLUMN id SET DEFAULT nextval('usuario_id_seq'::regclass);


--
-- Data for Name: catalogo_producto; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY catalogo_producto (codigocatalogo, descripcioncatalogo, id) FROM stdin;
01	Catálogo de productos y estándares de  las Naciones Unidas	1
02	Catálogo de clasificación de egresos de estado	2
\.


--
-- Data for Name: especifico; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY especifico (codigoespecifico, descripcionespecifico, id_catalogo_producto, id_rubro, id) FROM stdin;
61102	MAQUINARIAS Y EQUIPOS	2	1	1
61103	EQUIPOS MEDICOS Y DE LABORATORIO	2	1	2
61104	EQUIPOS INFORMATICOS	2	1	3
61105	VEHICULOS DE TRANSPORTE	2	1	4
61106	OBRAS DE ARTE Y CULTURALES	2	1	5
61107	LIBROS Y COLECCIONES	2	1	6
61108	HERRAMIENTAS Y REPUESTOS PRINCIPALES	2	1	7
61199	BIENES MUEBLES DIVERSOS	2	1	8
61201	TERRENOS	2	1	9
61202	EDIFICIOS E INSTALACIONES	2	1	10
61301	GANADO VACUNO	2	1	11
61302	GANADO CABALLAR	2	1	12
61303	GANADO PORCINO	2	1	13
61403	DERECHOS DE PROPIEDAD INTELECTUAL	2	1	14
54201	SERVICIOS DE ENERGIA Eléctrica	2	3	15
54202	SERVICIOS DE AGUA	2	3	16
54203	SERVICIOS DE TELECOMUNICACIONES	2	3	17
54204	SERVICIOS DE CORREOS	2	3	18
54301	MANTENIMIENTOS Y REPARACIONES DE BIENES MUEBLES	2	3	19
54302	MANTENIMIENTO Y REPARACIONES DE VEHICULOS	2	3	20
54303	MANTENIMIENTOS Y REPARACIONES DE BIENES INMUEBLES	2	3	21
54304	TRANSPORTES, FLETES Y ALMACENAMIENTOS	2	3	22
54305	SERVICIOS DE PUBLICIDAD	2	3	23
54306	SERVICIOS DE VIGILANCIA	2	3	24
54307	SERVICIOS DE LIMPIEZAS Y FUMIGACIONES	2	3	25
54308	SERVICIOS DE LAVANDERIAS Y PLANCHADO	2	3	26
54309	SERVICIOS DE LABORATORIOS	2	3	27
54310	SERVICIOS DE ALIMENTACION	2	3	28
54311	SERVICIOS EDUCATIVOS	2	3	29
54312	SERVICIOS PORTUARIOS, AEROPORTUARIOS Y FERROVIARIOS	2	3	30
54313	IMPRESIONES, PUBLICACIONES Y REPRODUCCIONES	2	3	31
54314	ATENCIONES OFICIALES	2	3	32
54316	ARRENDAMIENTO DE BIENES MUEBLES	2	3	33
54317	ARRENDAMIENTO DE BIENES INMUEBLES	2	3	34
54318	ARRENDAMIENTO POR EL USO DE BIENES INTANGIBLES	2	3	35
54399	SERVICIOS GENERALES Y ARRENDAMIENTOS DIVERSOS	2	3	36
54501	SERVICIOS MEDICOS	2	3	37
54502	SERVICIOS DEL MEDIO AMBIENTE Y RECURSOS NATURALES	2	3	38
54503	SERVICIOS JURIDICOS	2	3	39
54504	SERVICIOS DE CONTABILIDAD Y AUDITORIA 	2	3	40
54505	SERVICIOS DE CAPACITACION	2	3	41
54507	DESARROLLOS INFORMATICOS	2	3	42
54508	ESTUDIOS E INVESTIGACIONES	2	3	43
54599	CONSULTORIAS, ESTUDIOS E INVESTIGACIONES DIVERSAS	2	3	44
55601	PRIMAS Y GASTOS DE SEGUROS DE PERSONAS	2	3	45
55602	PRIMAS Y GASTOS DE SEGUROS DE BIENES	2	3	46
60000	SERVICIOS VARIOS	2	3	47
61501	PROYECTOS DE CONSTRUCCIONES	2	2	48
61502	PROYECTOS DE AMPLIACIONES	2	2	49
61601	VIALES	2	2	50
61602	DE SALUD Y SANEAMIENTO AMBIENTAL	2	2	51
61603	DE EDUCACION Y RECREACION	2	2	52
61604	DE VIVIENDA Y OFICINA	2	2	53
61605	PORTUARIAS, AEROPORTUARIAS Y FERROVIARIAS	2	2	54
61606	ELECTRICAS Y COMUNICACIONES	2	2	55
61607	DE PRODUCCION DE BIENES Y SERVICIOS	2	2	56
61608	SUPERVISION DE INFRAESTRUCTURA	2	2	57
90140000	Deportes comerciales	1	1	58
11100000	Minerales, minerales metálicos y metales	1	1	59
49130000	Equipos de pesca y caza	1	1	60
10100000	Animales vivos	1	1	61
90110000	Instalaciones hoteleras, alojamientos y centros de encuentros	1	1	62
10110000	Productos de casa para el animal doméstico (Juguetes, equipo y tratamiento médico para animales, etc.) 	1	1	63
10120000	Pienso para animales (Comida para animales)	1	1	64
10130000	Recipientes y hábitat para animales 	1	1	65
10140000	Artículos de talabartería y arreos (Herraduras, riendas, etc.)	1	1	66
10150000	Semillas, bulbos, plántulas y esquejes	1	1	67
10160000	Productos de floricultura y silvicultura	1	1	68
10170000	Abonos, nutrientes para plantas y herbicidas	1	1	69
10190000	Productos para el control de plagas y malas hierbas	1	1	70
11110000	Tierra y piedra	1	1	71
11120000	Productos no comestibles de planta y silvicultura (Bambú, pulpa de madera, paja, etc.)	1	1	72
11130000	Productos animales no comestibles (Plumas, pieles, pelo, etc.)	1	1	73
11140000	Chatarra y materiales de desecho (Desperdicio de madera, caucho, alimentos y residuos peligrosos como vidrio, etc.)	1	1	74
11150000	Fibra, hilos e hilados	1	1	75
11160000	Tejidos y materiales de cuero	1	1	76
11170000	Aleaciones (Acero Inoxidable, acero rápido, etc.)	1	1	77
11180000	Óxido metálico (Molibdeno, níquel, acero básico, bronce, etc.)	1	1	78
11190000	Desechos metálicos y chatarra (Cuerpos sólidos de niquel, acero, etc.)	1	1	79
12130000	Materiales explosivos	1	1	80
12140000	Elementos y gases (Fósforo, boro, nitrógeno, oxigeno, hidrogeno, etc.)	1	1	81
12160000	Aditivos (Reactivos, catalizadores, agentes de enlace, etc.)	1	1	82
12170000	Colorantes	1	1	83
12180000	Ceras y aceites (Sintéticas, naturales, parafinas, etc.)	1	1	84
12190000	Solventes (Aromáticos, alifáticos, de alcohol, etc.)	1	1	85
12350000	Compuestos y mezclas (Alcoholes, ácidos, sales, etc.)	1	1	86
13100000	Caucho y elastómeros	1	1	87
13110000	Resinas y colofonias y otros materiales derivados de resina	1	1	88
14100000	Materiales de papel	1	1	89
14110000	Productos de papel	1	1	90
14120000	Papel para uso industrial	1	1	91
15100000	Combustibles	1	1	92
15110000	Combustibles gaseosos y aditivos (Butano, acetileno, etileno, propileno. Etc.)	1	1	93
15120000	Lubricantes, aceites, grasas y anticorrosivos	1	1	94
20100000	Maquinaria y equipo de minería y explotación de canteras	1	1	95
21100000	Maquinaria y equipo para agricultura, silvicultura y paisaje (Arados, rodillos agrícolas, sembradoras, equipo de reforestación)	1	1	96
21110000	Equipo de pesca y acuicultura	1	1	97
22100000	Maquinaria y equipo pesado de construcción	1	1	98
23100000	Maquinaria para la transformación de materias primas (Perforadoras, trituradoras, cortadoras, torneadoras, fresadoras, sierras mecánicas, etc.)	1	1	99
82110000	Escritura y traducciones	1	1	100
23110000	Maquinaria para transformación de petróleo (Maquinaria para destilación de crudo, hidrotratador de gasolina, nafta y de residuos, etc.)	1	1	101
23120000	Maquinaria y accesorios de textiles y tejidos	1	1	102
23130000	Maquinaria y equipos lapidarios (Ruedas de esmerilado, de pulir, maquinaria y accesorios de facetaje, etc.)	1	1	103
23140000	Maquinaria de reparación y accesorios para trabajar cuero	1	1	104
23150000	Maquinaria, equipo y suministros de procesos industriales	1	1	105
23160000	Máquinas, equipo y suministros para fundición	1	1	106
23170000	Maquinaria, equipo y suministros para talleres (Sopletes, máquinas de soldar, electrodos, soldadura o kit, etc.)	1	1	107
23180000	Equipo industrial para alimentos y bebidas	1	1	108
23190000	Mezcladores y sus partes y accesorios	1	1	109
23200000	Equipamiento par transferencia de masa (Secadores de aire, columnas de burbuja, recubiertas, rellenas, etc.)	1	1	110
23210000	Maquinaria de fabricación electrónica, equipo y accesorios	1	1	111
23220000	Equipo y maquinaria de procesamiento de pollos (Lavador de jaulas, respiradero, etc.)	1	1	112
23230000	Equipo y maquinaria de procesamiento de madera y aserrado	1	1	113
24100000	Maquinaria y equipo para manejo de materiales (Carretillas, carretones, camión volcador, ascensores, montacargas, etc. )	1	1	114
24110000	Recipientes y almacenamiento (Tanques, redes, depósitos, cajas, latas, cubos, armarios, etc.)	1	1	115
24120000	Materiales de envasado	1	1	116
24130000	Refrigeración industrial (Refrigerador y congelador, cámaras refrigerantes, etc.)	1	1	117
24140000	Suministros de embalaje (Cuerdas, amarres, burbujas, carretel, separadores de cartón, etc.)	1	1	118
25100000	Vehículos de motor (Autobuses, automóviles, camiones, motocicletas, etc.)	1	1	119
25110000	Transporte marítimo	1	1	120
25120000	Maquinaria y equipo para ferrocarril y tranvías	1	1	121
25130000	Aeronaves (Avión, dirigibles, helicóptero, etc.)	1	1	122
25150000	Cosmonaves (Satélites, naves espaciales y estructuras, etc.)	1	1	123
25160000	Bicicletas no motorizadas	1	1	124
25170000	Componentes y sistemas de transporte	1	1	125
25180000	Carrocerías y remolques	1	1	126
25190000	Equipo para servicios de transporte	1	1	127
25200000	Sistemas aeroespaciales y componentes y equipo	1	1	128
26100000	Fuentes de energía (Motores, máquinas de vapor, alternadores, etc.)	1	1	129
26110000	Transmisión de baterías, generadores y energía cinética	1	1	130
26120000	Alambres, cables o arneses	1	1	131
26130000	Generación de energía ( Centrales hidroeléctricas, gas, petrolíferas, termoeléctrica, térmica, etc.)	1	1	132
26140000	Maquinaria y equipo para energía atómica o nuclear	1	1	133
27110000	Herramientas de mano	1	1	134
27120000	Maquinaria y equipo hidráulico	1	1	135
27130000	Maquinaria y equipo neumático	1	1	136
27140000	Herramientas especializadas de automoción (Herramientas de recorte o moldeos, extractor del volante, etc.)	1	1	137
30100000	Materiales estructurales: formas básicas (Àngulos, barras, vigas, conductos, bobinas, postes, etc.)	1	1	138
30110000	Hormigón, cemento y yeso	1	1	139
30120000	Carreteras y paisaje (Asfalto, brea, alquitrán de hulla, etc.)	1	1	140
30130000	Productos de construcción estructurales (Bloques, ladrillos, azulejos, piedras, etc.)	1	1	141
30140000	Aislamiento (pantallas térmicas, conchas aislantes, espumas, bloques de aislamientos, revestimientos térmicos, tabla rígida, ladrillos térmicos, aislante acústico, etc.) 	1	1	142
30150000	Materiales para acabado de exteriores (Cartón y tejidos para techos, membranas, armazones, tejas, planchas, drenajes, dinteles, etc.) 	1	1	143
30160000	Materiales de acabado de interiores (Fibra prensada, protectores, paneles, yeso, azulejos, encofrados, alfombra, vinilo, etc.)	1	1	144
30170000	Puertas y ventanas y vidrio (Tela metálica, madera, metal, contrapuertas, cierres, marcos, rodapiés, etc.)	1	1	145
30180000	Instalaciones de baño (Duchas, inodoros, urinarios, tabiques de aseo, etc.)	1	1	146
30190000	Equipo de apoyo para Construcción y Mantenimiento (Escaleras, andamios, barandillas, etc.)	1	1	147
30200000	Estructuras prefabricadas (Silos, invernaderos, casas, cabañas, cocinas, garajes, etc.)	1	1	148
30220000	Estructuras Permanentes (Carreteras, parques, mercados, edificios, etc.)	1	1	149
31100000	Piezas de fundición (Aluminio fundido, acero inoxidable, estaño, titanio, berilio, bronce, latón, plomo, etc.)	1	1	150
31110000	Extrusiones (Perfiles de aluminio, plomo, bronce, acero, zinc, latón en frío, etc.)	1	1	151
31120000	Piezas fundidas mecanizadas (Aleaciones ferrosas, no ferrosas, berilio, cobre, latón, bronce, etc.)	1	1	152
31130000	Forjaduras (Estampa de hierro, berilio, magnesio, aluminio, acero inoxidable, etc.)	1	1	153
31140000	Molduras (Inyección de plásticos, caucho, goma, etc.)	1	1	154
31150000	Cuerda y cadena y cable y alambre y correa (Nylón, poliéster, algodón, acero, cáñamo, henequén, cadenas, cuero, fibra,etc.)	1	1	155
31160000	Ferretería (Tornillos, clavos, pernos, tuercas, arandelas, resortes, anclas, etc.)	1	1	156
31170000	Cojinetes, casquillos, ruedas y engranajes (Esféricos, casquillos, piñones, etc.)	1	1	157
31180000	Juntas obturadoras y sellos (Plásticos, caucho, metal, textiles, embalajes, etc.)	1	1	158
31190000	Materiales de molduración, pulido y alisado (Lijas, bruñidores, abrasivos, diamantes, perdigones, etc.)	1	1	159
54115	MATERIALES INFORMATICOS	2	1	376
31200000	Adhesivos y selladores (Fibra de vidrio, grafito, papel, espuma, etc.)	1	1	160
31210000	Pinturas y tapa poros y acabados ( Esmaltes, pigmentos, aceites, látex, aerosol, acrílicos, etc.)	1	1	161
31220000	Extractos de teñir y de curtir (Origen orgánico, inorgánico para curtidos, vegetal, animal, etc.) 	1	1	162
31230000	Materia prima en placas o barras labradas ( Metal, aluminio, plomo, hierro, etc.)	1	1	163
31240000	Óptica industrial (Lentes, prismas, cristales, espejos metálicos, filtros, soportes, etc.)	1	1	164
31250000	Sistemas de control neumático, hidráulico o eléctrico (Selenoides, actuadores eléctricos y electrónicos, etc.)	1	1	165
31260000	Cubiertas, cajas y envolturas (Metálicas, plásticas, cascos, embragues, etc.)	1	1	166
31270000	Piezas hechas a máquina (Roscadas, metálicas, no metálicas, etc.)	1	1	167
31280000	Componentes de placa y estampados (Aluminio, hierro, aleaciones ferrosas, no ferrosas, etc.)	1	1	168
31290000	Estiramientos por presión labrados (Latón, aluminio, berilio, plomo, magnesio. etc.)	1	1	169
31300000	Forjas labradas ( Matriz, aleaciones ferrosas, no ferrosas, de titanio, de cobre, etc.)	1	1	170
31310000	Conjuntos de tubería fabricada (Cobre, aluminio, latón, acero inoxidable, etc.)	1	1	171
31320000	Conjuntos fabricados de material en barras (Aluminio, acero al carbono, cobre, etc.)	1	1	172
31330000	Conjuntos estructurales fabricados (Metálicos, no metálicos, soldados, etc.)	1	1	173
31340000	Conjuntos de placa fabricado (Aleación , soldados,  con latón, acero, etc.)	1	1	174
31350000	Conjuntos de tubería fabricada ( Cobre, aluminio, latón, acero inoxidable, etc.)	1	1	175
31360000	Conjuntos de placa fabricados (Aleación ligados de titanio,acero, aluminio, etc.)	1	1	176
31370000	Refractarios (Lana aislante, ladrillo de sílice, silicato de calcio, etc.)	1	1	177
31380000	Imanes y materiales magnéticos (Ferrita, neodimio, samario cobalto, etc.)	1	1	178
32100000	Circuitos impresos, circuitos integrados y micro ensamblajes (Circuitos mixtos, de superficie, de multicapa, detectores, etc.)	1	1	179
32110000	Dispositivo semiconductor discreto (Diodos, láser, transistores, chips, etc.)	1	1	180
32120000	Componentes pasivos discretos (Capacitores no regulados, resistores, fusibles, rectificadores, inductores, resistencias, etc.)	1	1	181
32130000	Piezas de componentes y hardware electrónico y accesorios (Circuitos integrados, dispositivos de calor, matrices de semiconductores, etc.)	1	1	182
32140000	Dispositivos de tubo electrónico y accesorios (Rayos catódicos, cátodos, ánodos, deflectores, rejillas, etc.)	1	1	183
39100000	Lámparas y bombillas y componentes para lámparas (Para médicos, alógenos, fluorescentes, de alcohol, solares, etc.)	1	1	184
39110000	Iluminación, artefactos y accesorios (Lámparas de pie, de mesa, laboratorio, velas de cera, portavelas, etc.) 	1	1	185
39120000	Equipos, suministros y componentes eléctricos (Transformadores, conversores de frecuencia, reguladores de potencia, reactores, etc.)	1	1	186
40100000	Calefacción, ventilación y circulación del aire (Calentadores, bombas de calor, calderas, vaporizadores, difusores, fuelles, colectores de aire, radiadores, etc.)	1	1	187
40140000	Distribución de fluidos y gas (De válvula de aguja, de seguridad, neumático, selenoide etc.)	1	1	188
40150000	Bombas y compresores industriales	1	1	189
40160000	Filtrado y purificación industrial (Maquinaria y filtro, etc.)	1	1	190
41110000	Instrumentos de medida, observación y ensayo (Balanzas, básculas, micrómetro, pedómetro, localizadores de señales etc. y accesorios.)	1	1	191
41120000	Suministros y accesorios de laboratorio	1	1	192
42120000	Equipos y suministros veterinarios	1	1	193
42130000	Telas y vestidos médicos	1	1	194
42140000	Suministros y productos de tratamiento y cuidado del enfermo(Algodón, paños, palitos, absobentes, equipo de ingreso etc.)	1	1	195
42150000	Equipos y suministros dentales (Barniz dental, recipientes, accesorios etc.)	1	1	196
42160000	Equipo de diálisis y suministros (Catéteres, recipientes, sacos etc.)	1	1	197
42170000	Productos para los servicios médicos de urgencias y campo (Bolsas del Cuerpo, etiquetas, traje, camillas de evacuación, literas de ambulancias, vestuarios antichoques etc.)	1	1	198
42180000	Productos de examen y control del paciente	1	1	199
42190000	Productos de facilidad médica (Medicamentos)	1	1	200
42200000	Productos de hacer imágenes diagnósticas médicas y de medicina nuclear (Tomografía informatizadas, monitores, tubos instalación de unidades de rezonancia etc.)	1	1	201
42210000	Ayuda para personas con desafíos físicos para vivir independiente (Dispositivos braille, bastones, asientos de baño, etc.)	1	1	202
42220000	Productos para administración intravenosa y arterial (Catéteres arteriales, válvulas, bandejas, equipo, accesorios, etc.)	1	1	203
42230000	Nutrición clínica (Accesorios de alimentación enteral)	1	1	204
42240000	Productos medicinales de deportes y prostético y ortopédico	1	1	205
42250000	Productos de rehabilitación y terapia ocupacional y física	1	1	206
42260000	Equipo y suministros post mortem y funerarios (Para autopsias, cuchillas, sondas, etc.)	1	1	207
42270000	Productos de resucitación y anestesia y respiratorio (Monitores, accesorios, gas, sangre, bióxido de carbono, estetoscopio del esófago, etc.)	1	1	208
42280000	Productos para la esterilización médica	1	1	209
42290000	Productos quirúrgicos	1	1	210
53140000	Fuentes y accesorios de costura	1	1	211
42300000	Suministros para formación y estudios de medicina (Modelos anatómicos, Maniquí, recortes, equipo, videos, etc.)	1	1	212
42310000	Productos para el cuidado de heridas	1	1	213
43190000	Dispositivos de comunicaciones y accesorios (Fija y móvil)	1	1	214
46120000	Misiles	1	1	215
43200000	Componentes para tecnología de la información, difusión o telecomunicaciones (Tarjetas aceleradora de video, o gráfico, módulo de memoria, etc.)	1	1	216
43210000	Equipo informático y accesorios	1	1	217
55120000	Etiquetado y accesorios (Sellos de notario, banderas, emblemas, etiquetas, etc.)	1	1	296
43220000	Datos-voz, equipo de red multimedia, plataformas y accesorios (Sistema automatizados de operadoras)	1	1	218
43230000	Software (Programas, juegos, plataformas, etc.)	1	1	219
44100000	Maquinaria, suministros y accesorios de oficina (Fotocopiadoras, fax, maquina para cortar papel, etc.)	1	1	220
44110000	Accesorios de oficina y escritorio (Dispensadores, organizadores, bandejas de correspondencia, sujeta libros, etc.)	1	1	221
44120000	Suministros de oficina	1	1	222
45100000	Equipo de imprenta y publicación	1	1	223
45110000	Equipos de audio y video para presentación y composición	1	1	224
45120000	Equipo de vídeo, filmación o fotografía	1	1	225
45130000	Medios fotográficos y de grabación	1	1	226
45140000	Suministros fotográficos para cine (Materiales y accesorios para revelados). 	1	1	227
46100000	Armas ligeras y munición	1	1	228
46110000	Armas de guerra convencionales	1	1	229
46130000	Cohetes y subsistemas	1	1	230
46140000	Lanzadores (Misiles y cohetes) 	1	1	231
46150000	Orden Público (Equipo y accesorios de seguridad para unidades especializadas)	1	1	232
46160000	Seguridad y control público (Sistemas de señalización y equipo)	1	1	233
46170000	Seguridad, vigilancia y detección (Sistemas y equipos de seguridad de inmuebles)	1	1	234
46180000	Seguridad y protección personal (Vestuario y equipo de protección)	1	1	235
46190000	Protección contra incendios (Equipo y sistemas)	1	1	236
47100000	Tratamiento, suministros y eliminación de agua y aguas residuales (Equipo y materiales químicos para el tratamiento de agua)	1	1	237
47110000	Equipo industrial de lavandería y limpieza en seco 	1	1	238
47120000	Equipo de limpieza (Accesorios y útiles de limpieza)	1	1	239
47130000	Suministros de limpieza (Escobas, trapos, esponjas, cepillos, trapeadores, etc.)	1	1	240
48100000	Equipos de servicios de alimentación para instituciones (Utensilios, equipo de cocina comercial y mobiliario)	1	1	241
48110000	Máquinas expendedoras (Alimentos, bebidas, cajeros automáticos, etc.)	1	1	242
48120000	Equipo de Juego o de Apostar (Lo utilizado en casinos)	1	1	243
49100000	Coleccionables y condecoraciones (antigüedades y preseas)	1	1	244
49120000	Equipos y accesorios para acampada y exterior 	1	1	245
49140000	Equipos para deportes acuáticos	1	1	246
49150000	Equipos para deportes de invierno	1	1	247
49160000	Equipos deportivos para campos y canchas	1	1	248
49170000	Equipos de gimnasia y boxeo	1	1	249
49180000	Juegos y equipo de tiro y mesa	1	1	250
49200000	Equipo para entrenamiento físico	1	1	251
49210000	Otros deportes (Equipo de golf, boliche, paracaidismo, educación física, etc.)	1	1	252
49220000	Equipo de deporte y accesorios (Porterías, aros, redes, canastas, patines, gorras, etc.)	1	1	253
49240000	Equipo de recreo y parques infantiles y equipo y suministros de natación y de spa	1	1	254
50100000	Frutas, verduras y frutos secos	1	1	255
50110000	Productos de carne y aves de corral (Productos  frescos, procesados y congelados)	1	1	256
50120000	Pescados y mariscos (Productos frescos y congelados)	1	1	257
50130000	Productos lácteos y huevos	1	1	258
50150000	Aceites y grasas comestibles	1	1	259
50160000	Chocolates, azúcares, edulcorantes y productos de confitería	1	1	260
50170000	Condimentos y conservantes (Hierbas, especies, sales, salsas, etc.)	1	1	261
50180000	Productos de panadería (Pan, galletas, tartas, masas, etc.)	1	1	262
50190000	Alimentos preparados y conservados	1	1	263
50200000	Bebidas (Café, té, hielo, refrescos, cremas no lácteas, cerveza, vino, alcohol, licores, etc.)	1	1	264
50210000	Tabaco y productos de fumar y substitutos	1	1	265
50220000	Productos de Cereales y Legumbres	1	1	266
51100000	Medicamentos antiinfecciosos	1	1	267
51110000	Agentes antitumorales	1	1	268
51120000	Medicamentos cardiovasculares	1	1	269
51130000	Medicamentos hematólicos	1	1	270
51140000	Medicamentos para el sistema nervioso central	1	1	271
51150000	Medicamentos para el sistema nervioso autónomo	1	1	272
51160000	Medicamentos que afectan al tracto respiratorio	1	1	273
51170000	Medicamentos que afectan al sistema gastrointestinal	1	1	274
51180000	Hormonas y antagonistas hormonales	1	1	275
51190000	Agentes que afectan el agua y los electrolitos (Metalazona, dextrosa, acetato sódico, etc.)	1	1	276
51200000	Medicamentos inmunomoduladores	1	1	277
51210000	Categorías de medicamentos varios	1	1	278
51240000	Fármacos que afectan a los oídos, los ojos, la nariz y la piel	1	1	279
51250000	Suplementos alimenticios veterinarios	1	1	280
52100000	Revestimientos de suelos (Alfombras sintéticas, alfombras de algodón, etc.)	1	1	281
52120000	Ropa de cama, mantelerías, paños de cocina y toallas	1	1	282
52130000	Tratamientos de ventanas (Cortinas, persianas venecianas, barras de cortina, etc.)	1	1	283
52140000	Aparatos electrodomésticos	1	1	284
52150000	Utensilios de cocina domésticos	1	1	285
52160000	Electrónica de consumo (Televisores, radios, reproductores de discos láser, etc.)	1	1	286
52170000	Tratamientos de pared doméstica (Estante, organizador de tocador colgante, etc.)	1	1	287
53100000	Ropa	1	1	288
53110000	Calzado	1	1	289
53120000	Maletas, bolsos de mano, mochilas y estuches	1	1	290
53130000	Artículos de tocador	1	1	291
54110000	Relojes	1	1	292
54120000	Gemas	1	1	293
55100000	Medios impresos (Directorios, catálogos, revistas periódicos)	1	1	294
55110000	Material electrónico de referencia (Diccionarios electrónicos, películas de cine en cinta de video, etc.)	1	1	295
54114	MATERIALES DE OFICINA	2	1	375
56100000	Muebles de alojamiento (Sofás, sillas, mesas, escritorios, archivos, etc.)	1	1	297
56110000	Muebles comerciales e industriales (Credenza  y estantería no modular, etc.)	1	1	298
56120000	Mobiliario institucional, escolar y educativo y accesorios	1	1	299
60100000	Materiales didácticos profesionales y de desarrollo y accesorios y suministros	1	1	300
60110000	Decoraciones y suministros del aula	1	1	301
60120000	Equipo de arte y manualidades, accesorios y suministros	1	1	302
60130000	Instrumentos musicales, piezas y accesorios	1	1	303
60140000	Juguetes y juegos	1	1	304
70100000	Pesquerías y acuicultura (Servicio de puerto pesquero, redes, viveros de pesca, etc.)	1	1	305
70110000	Horticultura (Servicios de plantación, poda, traslado, etc.)	1	1	306
70120000	Servicios de ganadería	1	1	307
70130000	Preparación, gestión y protección del terreno y del suelo	1	1	308
70140000	Producción, gestión y protección de cultivos	1	1	309
70150000	Cultivos forestales (Servicios de asistencia y repoblación forestal, etc.)	1	1	310
70160000	Fauna y flora (Servicios de ecodesarrollo, ecosistema terrestre, etc.)	1	1	311
70170000	Desarrollo y vigilancia de recursos hidráulicos	1	1	312
71100000	Servicios de minería	1	1	313
71110000	Servicios de perforación y prospección petrolífera y de gas	1	1	314
71120000	Servicios de mantenimiento y construcción de perforación de pozos	1	1	315
71130000	Servicios de aumento de la extracción producción de gas y petróleo	1	1	316
71140000	Servicios de restauración y recuperación de gas y aceite	1	1	317
71150000	Servicios de procesar y gestión de datos del aceite y gas	1	1	318
71160000	Servicios de gerencia del proyecto de aceite y gas del pozo	1	1	319
72100000	Construcción de edificios, atención, mantenimiento y servicios de reparaciones (Servicios de soporte, mantenimiento y reparación de edificios construidos, etc.)	1	1	320
72130000	Construcción general de edificios (Residencias, locales industriales, etc.)	1	1	321
73150000	Servicios de apoyo a la fabricación (Montaje, envasado, impresión, mantenimiento y reparación de equipo, etc.)	1	1	322
73180000	Servicios de labrado y procesado (Servicios de taladrar, perforar, láser, etc.)	1	1	323
76100000	Servicios de descontaminación (Servicios de descontaminación, desinfección y desodorización, etc.)	1	1	324
76110000	Servicios de limpieza y de consejería	1	1	325
76120000	Eliminación y tratamiento de desechos	1	1	326
76130000	Limpieza de residuos tóxicos y peligrosos	1	1	327
77100000	Gestión medioambiental (Evaluación, planificación y asesoría, etc.)	1	1	328
77110000	Protección medioambiental (Seguridad y rehabilitación, etc.)	1	1	329
77120000	Seguimiento, control y rehabilitación de la contaminación	1	1	330
77130000	Servicios de seguimiento, control o rehabilitación de contaminantes	1	1	331
78100000	Transporte de correo y carga	1	1	332
78110000	Transporte de pasajeros	1	1	333
78120000	Manejo y embalaje de material	1	1	334
78130000	Almacenaje	1	1	335
78140000	Operaciones de transporte (Inspección de paquetes, vigilancia de cargas y control de plagas, etc.)	1	1	336
84140000	Agencias de crédito ( Tarjetas, agrícolas, etc.)	1	1	337
85100000	Servicios sanitarios integrales (Hospitalarios de emergencia o quirúrgicos, etc.)	1	1	338
85110000	Prevención y control de enfermedades	1	1	339
85120000	Práctica médica (Servicios médicos)	1	1	340
85130000	Ciencia médica, investigación y experimentación	1	1	341
85140000	Medicina alternativa y holística (Medicina por hierbas o servicios de herbolarios)	1	1	342
85150000	Servicios alimentarios y de nutrición	1	1	343
86100000	Formación profesional	1	1	344
86110000	Sistemas educativos alternativos	1	1	345
86120000	Instituciones educativas	1	1	346
86130000	Servicios educativos especializados	1	1	347
86140000	Instalaciones educativas (Servicios de asesoramiento de estudios en el extranjero, programas de viajes para estuiantes, etc.)	1	1	348
90100000	Restaurantes y catering (Servicios de comidas y bebidas)	1	1	349
90120000	Facilitación de viajes (Agencias de viajes, guías turísticas, intérpretes, etc.)	1	1	350
90130000	Artes interpretativas	1	1	351
90150000	Servicios de entretenimiento	1	1	352
91100000	Aspecto personal (Club de salud, balnearios, etc.)	1	1	353
91110000	Asistencia doméstica y personal (Servicios de lavandería, limpieza en seco, etc.)	1	1	354
92100000	Orden público y seguridad (Servicios de vigilancia, bomberos, servicios de prisión, etc.)	1	1	355
92110000	Servicios militares o defensa nacional	1	1	356
92120000	Seguridad y protección personal	1	1	357
93140000	Servicios comunitarios y sociales	1	1	358
93150000	Servicios de administración y financiación pública	1	1	359
93170000	Política y regulación comercial (Convenciones aduaneras, acuerdos comerciales, política de exportación, etc.)	1	1	360
61699	OBRAS DE INFRAESTRUCTURAS DIVERSAS	2	2	361
54101	PRODUCTOS ALIMENTICIOS PARA PERSONAS	2	1	362
54102	PRODUCTOS ALIMENTICIOS PARA ANIMALES	2	1	363
54103	PRODUCTOS AGROPECUARIOS Y FORESTALES	2	1	364
54104	PRODUCTOS TEXTILES Y VESTUARIOS	2	1	365
54105	PRODUCTOS DE PAPEL Y CARTON	2	1	366
54106	PRODUCTOS DE CUERO Y CAUCHO	2	1	367
54107	PRODUCTOS QUIMICOS	2	1	368
54108	PRODUCTOS FARMACEUTICOS Y MEDICINALES	2	1	369
54109	LLANTAS Y NEUMATICOS	2	1	370
54110	COMBUSTIBLES Y LUBRICANTES	2	1	371
54111	MINERALES NO METALICOS Y PRODUCTOS DERIV.	2	1	372
54112	MINERALES METALICOS Y PRODUCTOS DERIVADOS	2	1	373
54113	MATERIALES E INSTRUMENTAL DE LABORATORIOS Y USO MEDICO	2	1	374
54116	LIBROS, TEXTOS UTILES DE ENSEÑANZA Y PUBLICACIONES	2	1	377
54117	MATERIALES DE DEFENSA Y SEGURIDAD PUBLICA	2	1	378
54118	HERRAMIENTAS, REPUESTOS Y ACCESORIOS	2	1	379
54119	MATERIALES ELECTRICOS	2	1	380
54199	BIENES DE USO Y CONSUMO DIVERSOS	2	1	381
54401	PASAJES AL INTERIOR	2	1	382
54402	PASAJES AL EXTERIOR	2	1	383
61101	MOBILIARIOS	2	1	384
54100000	Joyería	1	1	385
41100000	Equipo de laboratorio y científico	1	1	386
78180000	Servicios de mantenimiento o reparaciones de transportes	1	1	387
80100000	Servicios de asesoría de gestión (consultarías en general)	1	1	388
80110000	Servicios de recursos humanos	1	1	389
80120000	Servicios legales ( Derecho penal, mercantil, civil, de familia, etc.)	1	1	390
80130000	Servicios inmobiliarios (Ventas, arrendamientos, etc.)	1	1	391
80140000	Comercialización y distribución (Servicios de mercadeo, ventas, investigación, etc.)	1	1	392
80150000	Política comercial y servicios (Expansión comercial, importación , exportación, etc.)	1	1	393
80160000	Servicios de administración de empresas	1	1	394
81100000	Servicios profesionales de ingeniería	1	1	395
81110000	Servicios informáticos (Diseño software, programación de base de datos, etc.)	1	1	396
81120000	Economía (Análisis de macro y micro economía, política monetaria, liquide, etc.)	1	1	397
81130000	Estadística (Encuestas por muestreo, de regresión, de factor, etc.)	1	1	398
81140000	Tecnologías de fabricación (Ensayo de materiales, productos, calibrado de equipos, etc.)	1	1	399
81150000	Servicios de pedología (Estudios de mapas, geografía, topografía, etc.)	1	1	400
82100000	Publicidad	1	1	401
82120000	Servicios de reproducción	1	1	402
82130000	Servicios fotográficos	1	1	403
82140000	Diseño gráfico	1	1	404
82150000	Artistas e intérpretes profesionales	1	1	405
83100000	Servicios públicos (Abastecimiento agua, energía, gas, etc.)	1	1	406
83110000	Servicios de medios de telecomunicaciones	1	1	407
83120000	Servicios de información (Bibliotecas, servicios relacionados con radio, TV, Internet, etc.)	1	1	408
84100000	Finanzas de desarrollo (Asistencia Financiera, recaudación de deudas, readquisición, etc.)	1	1	409
84110000	Contabilidad y auditorias	1	1	410
84120000	Banca e inversiones	1	1	411
84130000	Servicios de seguros y jubilación	1	1	412
\.


--
-- Data for Name: fuente_financiamiento; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY fuente_financiamiento (codigofuente, descripcionfuente, id_origen_financiamiento, id) FROM stdin;
006	BID	2	4
010	PNUD	2	8
002	Recursos propios	1	15
001	Fondo General	1	17
018	Donación	2	18
\.


--
-- Data for Name: item; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY item (descripcionitem, autorizado, descontinuado, preciounitario, bloqueado, observaciones, id_especifico, id, id_especifico_onu, id_unidad_medida) FROM stdin;
D.S. Tetraciclina Vial 50 discos 	t	f	4.80	f	\N	368	48	386	239
SHARP,TONER AR-M317	t	f	72.00	f	\N	368	49	221	238
Focos de 60 Watts	t	f	0.34	f	\N	380	50	184	238
Mesa de Tenis de Mesa	t	f	409.09	f	\N	377	51	248	238
Cuaderno #3 de espiral de una materia con minerva impresa al frente	t	f	1.02	f	\N	366	52	90	238
Termicos de 15 amperios	t	f	105.60	f	observando mas	380	44	186	238
Amortiguadores delanteros	t	f	24.66	t	\N	379	54	125	238
Chapa de perilla para puerta	t	f	21.91	f	\N	381	55	151	238
HP Oficcerjet J6480 CB 335W Negro	t	f	30.00	f	\N	376	56	182	238
Guante  de tela  medianos 	t	f	1.20	f	\N	367	58	75	238
Mesa circular par 6 personas.  1" de espesor con plástico laminado tapacanto de pvc, patas de madera comprimida de 1" forradas con plástico	t	f	218.40	f	\N	384	60	297	238
Cinturón portaherramientas ajustable	t	f	62.40	f	\N	379	40	156	238
Tinta china negra	t	f	6.00	f	\N	368	62	83	110
GESTETNER,ROLLO DE MASTER P/DUPLICADOR CP6143L	t	f	65.44	f	\N	368	63	222	219
Derumbe del Neoliberalismo, Salvador Arias	t	f	24.00	f	\N	377	64	294	238
Alquiler de buses para eventos del Programa Jovenes Talento	t	f	60.00	f	\N	382	65	333	238
Juego 20 Llaves ALLEN MET/PULG.	t	f	3.00	f	\N	379	66	134	124
Canaleta de 2x1"	t	f	9.60	f	\N	380	67	156	238
Redes, Para zooplancton de 100 micras de poro (mesh)	t	f	600.00	f	\N	365	68	288	238
Flor Fenicol	t	f	36.46	f	\N	369	69	193	29
Catéteres Vesicales	t	f	12.00	f	\N	374	70	192	238
DESDE SYMFONY	t	f	2.20	f	dghdg	34	23324	69	249
DESDE SYMFONY	t	f	2.20	f	dghdg	34	23325	69	249
DESDE SYMFONY	t	f	2.20	f	dgdgd	34	23326	69	249
ALCOHOLIMETRO	t	f	41.64	f	\N	2	39	386	238
Aminolite	t	f	12.28	f	\N	369	1	195	259
Colchoneta 	t	f	24.00	f	\N	377	2	252	238
Brújula 	t	f	129.60	f	\N	374	3	192	238
Clavos, De 4"	t	f	0.79	f	\N	373	5	156	229
brochas de 2 1/2"	t	f	2.70	f	\N	379	6	156	238
LACTOSA USP	t	f	36.00	f	\N	368	9	192	125
Laja	t	f	21.60	f	\N	372	10	177	129
POLIDUCTO 1 1/4”	t	f	0.78	f	\N	380	11	188	238
LANOLINA ANHIDRA	t	f	30.00	f	\N	368	12	86	125
LILAS HSMO13056	t	f	60.00	f	\N	368	13	85	110
MEBENDAZOL	t	f	117.60	f	\N	368	14	86	110
Clip Binder de 1/2	t	f	0.41	t	\N	375	15	222	63
Micropore 6"	t	f	30.00	f	\N	374	16	192	219
Pinceles, Valoro 1	t	f	0.35	f	\N	374	17	192	238
Lisozima	t	f	132.00	f	\N	368	18	192	258
HP, TINTA C9391AN	t	f	28.10	t	\N	376	19	222	238
Lupas	t	f	49.20	f	\N	374	20	192	238
HP, TINTA C9393AN	t	f	28.10	t	\N	376	21	222	238
HP, TINTA C9396AN	t	f	42.37	t	\N	376	22	222	238
HP, TINTA CB337W	t	f	21.28	t	\N	376	23	222	238
Rapidograf  0.5	t	f	12.50	t	\N	375	24	222	238
Alcohol de 90 grados(limpieza)	t	f	9.41	f	\N	368	25	86	119
Cinta super 33	t	f	2.94	f	\N	55	26	186	238
KYOCERA MITA, TONER TK-677 para KM2540-2560-3040-3060	t	f	120.00	t	\N	376	28	220	238
Biología Sistemas Vivos, Raymond Oram, ISBN: 9701062922, (Año 2007, 1a. Edición) Idioma: Español	t	f	79.00	f	\N	377	30	294	238
Conector EMT de 4" c/ tornillo	t	f	16.21	f	\N	55	31	186	238
Billetera	t	f	1.68	f	\N	365	37	290	238
Mesas de trabajo tipo escritorio	t	f	96.00	f	\N	384	38	297	238
D.S. Penicilina 10 UNITS, 50 discos,	t	f	4.84	f	\N	368	41	386	239
prueba	f	f	2.30	\N	\N	1	23327	1	1
Comentarios a la Ley de Notariado/ Editorial Jurídica	t	f	12.00	f	\N	377	43	294	238
prueba	f	f	2.00	f	\N	34	23328	69	249
prueba	f	f	2.00	f	\N	34	23329	69	249
prueba	f	f	2.00	f	\N	34	23330	69	249
prueba	f	f	2.00	f	\N	34	23331	69	249
aaaaa	f	f	2.00	f	\N	34	23332	69	249
ubos de abasto, P/ Inodoros , Forrados plástico 18" x  1/4 “x  3/4"	t	f	3.19	f	prueba	379	45	188	238
Cuaderno #12 de espiral de tres materias con logo de "Minerva"	t	f	0.00	f	\N	366	47	90	238
\.


--
-- Data for Name: linea_plan; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY linea_plan (preciounitario, id, id_plan_compras, id_unidad_medida, id_item, cantidad_pedido) FROM stdin;
12.00	125569	585	239	43	1
218.40	125572	585	238	60	1
4.80	125568	585	239	41	2
72.00	125570	585	238	49	2
96.00	125574	585	238	38	7
6.00	125573	585	110	62	33
\.


--
-- Data for Name: linea_requerimiento; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY linea_requerimiento (preciounitario, especificaciones, cantidad, id_requerimiento, id_unidad_medida, id, id_item) FROM stdin;
\.


--
-- Data for Name: nivel; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY nivel (codigonivel, descripcionnivel, id) FROM stdin;
00	Universidad de El Salvador	1
01	Unidad presupuestaria	2
02	Línea de trabajo	3
03	Unidad solicitante	4
\.


--
-- Data for Name: origen_financiamiento; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY origen_financiamiento (codigoorigen, descripcionorigen, id) FROM stdin;
L	Locales	1
E	Externos	2
\.


--
-- Data for Name: pedido_producto; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY pedido_producto (numeropedido, mespedido, cantidad, id_linea_plan, id) FROM stdin;
\.


--
-- Data for Name: perfil_usuario; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY perfil_usuario (codigoperfil, descripcionperfil, id) FROM stdin;
01	Administrador	1
02	Gestor de compras	2
03	Jefe UACI	3
05	Unidad solicitante	4
06	Vice-rectoría Administrativa	5
04	Presupuesto	6
07	Guardalmacen	7
\.


--
-- Data for Name: periodo_fiscal; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY periodo_fiscal (aniofiscal, estaactivo, id) FROM stdin;
2011	t	4
\.


--
-- Data for Name: plan_compras; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY plan_compras (numeroconvenio, montoplan, autorizado, fecha_autorizacion, enviado, fecha_envio, consolidado, modificaciones_hasta, permisos, id_fuente_financiamiento, id_subfuente_financiamiento, id, id_periodo_fiscal, id_unidad_solicitante, id_unidad_financiadora, numeroplan) FROM stdin;
\N	0.00	f	\N	f	\N	f	\N	\N	18	10	585	4	2	1	0002
\.


--
-- Data for Name: requerimiento; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY requerimiento (numerorequerimiento, numerorequerimiento_xuni, numero_dictamentf, fecharequerimiento, montorequerimiento, finalizado, observaciones, fecha_entregado, id, id_periodo_fiscal, id_unidad_solicitante) FROM stdin;
\.


--
-- Data for Name: rubro; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY rubro (codigorubro, descripcionrubro, id) FROM stdin;
01	Bien	1
02	Obra	2
03	Servicio	3
\.


--
-- Data for Name: subfuente_financiamiento; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY subfuente_financiamiento (codigosubfuente, descripcionsubfuente, id_fuente_financiamiento, id) FROM stdin;
001	Fondos Generales	17	9
010	Unidades Productivas	15	10
\.


--
-- Data for Name: techo_presupuestario; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY techo_presupuestario (montoasignado, id_fuente_financiamiento, id_periodo_fiscal, id_unidad_solicitante, id_unidad_financiadora, id) FROM stdin;
\.


--
-- Data for Name: unidad_medida; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY unidad_medida (codigounidadmedida, descripcionunidadmedida, id) FROM stdin;
209	Obra	1
262	sobre 500	24
085	Fco 100 ml	29
144	Par 	47
052	Caja de 12	63
082	Docena	94
091	Frasco 2.5 LTS.	100
092	Frasco 25 GR	101
098	Frasco 500 GR	107
099	Frasco 500 ML	109
100	Frasco	110
107	Frasco 50 ml.	116
110	Galón 	119
115	Juego	124
116	KG	125
119	litro	127
121	Metro	129
205	ml	132
207	servicio	133
274	tableta	193
151	quintal	217
153	Rollo	219
159	saco	224
118	libra	229
172	UNIDAD	238
174	vial	239
180	gramos	245
014	2.5 L	249
023	500 GRAMOS	258
024	500 ML	259
027	block	262
036	caja	271
143	paq 100 unids	294
311	c/u	297
\.


--
-- Data for Name: unidad_solicitante; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY unidad_solicitante (codigounidad, nombreunidad, realizaplan, realizaacta, realizaordencompra, id, id_nivel, id_unidad_superior) FROM stdin;
00000000	Empresa XXXX	f	f	t	1	1	\N
01000000	Contabilidad	t	f	t	2	3	1
02000000	Recursos Humanos	t	t	t	5	4	1
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY usuario (estaactivo, email, id_perfil_usuario, id, id_unidad_solicitante, username, username_canonical, email_canonical, enabled, algorithm, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at) FROM stdin;
t	rigoberto.reyes@gmail.com	\N	187	\N	rigo	rigo	rigoberto.reyes@gmail.com	t	sha512	ex293vorrzwc8k4ksgowsgg80ckkocc	4d10cc1566f53c88e6e019e7d4f49da7daa3a96e1af0c839fd98a27e2ecf85420210fb2a7b0519a111a0140a5f02b4e8e538faa8dd09f05e40fecaf19ff90874	2011-08-17 19:47:59	f	f	\N	\N	\N	a:0:{}	f	\N
\.


--
-- Name: catalogo_producto_codigocatalogo_key; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY catalogo_producto
    ADD CONSTRAINT catalogo_producto_codigocatalogo_key UNIQUE (codigocatalogo);


--
-- Name: catalogo_producto_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY catalogo_producto
    ADD CONSTRAINT catalogo_producto_pkey PRIMARY KEY (id);


--
-- Name: especifico_codigoespecifico_key; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY especifico
    ADD CONSTRAINT especifico_codigoespecifico_key UNIQUE (codigoespecifico);


--
-- Name: especifico_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY especifico
    ADD CONSTRAINT especifico_pkey PRIMARY KEY (id);


--
-- Name: fuente_financiamiento_codigofuente_key; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY fuente_financiamiento
    ADD CONSTRAINT fuente_financiamiento_codigofuente_key UNIQUE (codigofuente);


--
-- Name: fuente_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY fuente_financiamiento
    ADD CONSTRAINT fuente_financiamiento_pkey PRIMARY KEY (id);


--
-- Name: item_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY item
    ADD CONSTRAINT item_pkey PRIMARY KEY (id);


--
-- Name: linea_plan_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY linea_plan
    ADD CONSTRAINT linea_plan_pkey PRIMARY KEY (id);


--
-- Name: linea_requerimiento_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY linea_requerimiento
    ADD CONSTRAINT linea_requerimiento_pkey PRIMARY KEY (id);


--
-- Name: nivel_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY nivel
    ADD CONSTRAINT nivel_pkey PRIMARY KEY (id);


--
-- Name: origen_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY origen_financiamiento
    ADD CONSTRAINT origen_financiamiento_pkey PRIMARY KEY (id);


--
-- Name: pedido_producto_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY pedido_producto
    ADD CONSTRAINT pedido_producto_pkey PRIMARY KEY (id);


--
-- Name: perfil_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY perfil_usuario
    ADD CONSTRAINT perfil_usuario_pkey PRIMARY KEY (id);


--
-- Name: periodo_fiscal_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY periodo_fiscal
    ADD CONSTRAINT periodo_fiscal_pkey PRIMARY KEY (id);


--
-- Name: plan_compras_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY plan_compras
    ADD CONSTRAINT plan_compras_pkey PRIMARY KEY (id);


--
-- Name: requerimiento_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY requerimiento
    ADD CONSTRAINT requerimiento_pkey PRIMARY KEY (id);


--
-- Name: rubro_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY rubro
    ADD CONSTRAINT rubro_pkey PRIMARY KEY (id);


--
-- Name: subfuente_financiamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY subfuente_financiamiento
    ADD CONSTRAINT subfuente_financiamiento_pkey PRIMARY KEY (id);


--
-- Name: techo_presupuestario_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY techo_presupuestario
    ADD CONSTRAINT techo_presupuestario_pkey PRIMARY KEY (id);


--
-- Name: unidad_medida_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY unidad_medida
    ADD CONSTRAINT unidad_medida_pkey PRIMARY KEY (id);


--
-- Name: unidad_solicitante_id_key; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY unidad_solicitante
    ADD CONSTRAINT unidad_solicitante_id_key UNIQUE (id);


--
-- Name: unidad_solicitante_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY unidad_solicitante
    ADD CONSTRAINT unidad_solicitante_pkey PRIMARY KEY (id);


--
-- Name: usuario_id_key; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_key UNIQUE (id);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: admin; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- Name: uniq_2265b05d92fc23a8; Type: INDEX; Schema: public; Owner: admin; Tablespace: 
--

CREATE UNIQUE INDEX uniq_2265b05d92fc23a8 ON usuario USING btree (username_canonical);


--
-- Name: uniq_2265b05da0d96fbf; Type: INDEX; Schema: public; Owner: admin; Tablespace: 
--

CREATE UNIQUE INDEX uniq_2265b05da0d96fbf ON usuario USING btree (email_canonical);


--
-- Name: especifico_id_catalogo_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY especifico
    ADD CONSTRAINT especifico_id_catalogo_producto_fkey FOREIGN KEY (id_catalogo_producto) REFERENCES catalogo_producto(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: especifico_id_rubro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY especifico
    ADD CONSTRAINT especifico_id_rubro_fkey FOREIGN KEY (id_rubro) REFERENCES rubro(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: item_id_especifico_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY item
    ADD CONSTRAINT item_id_especifico_fkey FOREIGN KEY (id_especifico) REFERENCES especifico(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: item_id_especifico_onu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY item
    ADD CONSTRAINT item_id_especifico_onu_fkey FOREIGN KEY (id_especifico_onu) REFERENCES especifico(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: item_id_unidad_medida_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY item
    ADD CONSTRAINT item_id_unidad_medida_fkey FOREIGN KEY (id_unidad_medida) REFERENCES unidad_medida(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: linea_plan_id_item_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY linea_plan
    ADD CONSTRAINT linea_plan_id_item_fkey FOREIGN KEY (id_item) REFERENCES item(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: linea_plan_id_plan_compras_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY linea_plan
    ADD CONSTRAINT linea_plan_id_plan_compras_fkey FOREIGN KEY (id_plan_compras) REFERENCES plan_compras(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: linea_plan_id_unidad_medida_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY linea_plan
    ADD CONSTRAINT linea_plan_id_unidad_medida_fkey FOREIGN KEY (id_unidad_medida) REFERENCES unidad_medida(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: linea_requerimiento_id_item_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY linea_requerimiento
    ADD CONSTRAINT linea_requerimiento_id_item_fkey FOREIGN KEY (id_item) REFERENCES item(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: linea_requerimiento_id_requerimiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY linea_requerimiento
    ADD CONSTRAINT linea_requerimiento_id_requerimiento_fkey FOREIGN KEY (id_requerimiento) REFERENCES requerimiento(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: linea_requerimiento_id_unidad_medida_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY linea_requerimiento
    ADD CONSTRAINT linea_requerimiento_id_unidad_medida_fkey FOREIGN KEY (id_unidad_medida) REFERENCES unidad_medida(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: pedido_producto_id_linea_plan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY pedido_producto
    ADD CONSTRAINT pedido_producto_id_linea_plan_fkey FOREIGN KEY (id_linea_plan) REFERENCES linea_plan(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: plan_compras_id_fuente_financiamiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY plan_compras
    ADD CONSTRAINT plan_compras_id_fuente_financiamiento_fkey FOREIGN KEY (id_fuente_financiamiento) REFERENCES fuente_financiamiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: plan_compras_id_periodo_fiscal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY plan_compras
    ADD CONSTRAINT plan_compras_id_periodo_fiscal_fkey FOREIGN KEY (id_periodo_fiscal) REFERENCES periodo_fiscal(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: plan_compras_id_subfuente_financiamiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY plan_compras
    ADD CONSTRAINT plan_compras_id_subfuente_financiamiento_fkey FOREIGN KEY (id_subfuente_financiamiento) REFERENCES subfuente_financiamiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: plan_compras_id_unidad_financiadora_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY plan_compras
    ADD CONSTRAINT plan_compras_id_unidad_financiadora_fkey FOREIGN KEY (id_unidad_financiadora) REFERENCES unidad_solicitante(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: plan_compras_id_unidad_solicitante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY plan_compras
    ADD CONSTRAINT plan_compras_id_unidad_solicitante_fkey FOREIGN KEY (id_unidad_solicitante) REFERENCES unidad_solicitante(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: requerimiento_id_periodo_fiscal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY requerimiento
    ADD CONSTRAINT requerimiento_id_periodo_fiscal_fkey FOREIGN KEY (id_periodo_fiscal) REFERENCES periodo_fiscal(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: requerimiento_id_unidad_solicitante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY requerimiento
    ADD CONSTRAINT requerimiento_id_unidad_solicitante_fkey FOREIGN KEY (id_unidad_solicitante) REFERENCES unidad_solicitante(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: subfuente_financiamiento_id_fuente_financiamiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY subfuente_financiamiento
    ADD CONSTRAINT subfuente_financiamiento_id_fuente_financiamiento_fkey FOREIGN KEY (id_fuente_financiamiento) REFERENCES fuente_financiamiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: techo_presupuestario_id_fuente_financiamiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY techo_presupuestario
    ADD CONSTRAINT techo_presupuestario_id_fuente_financiamiento_fkey FOREIGN KEY (id_fuente_financiamiento) REFERENCES fuente_financiamiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: techo_presupuestario_id_periodo_fiscal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY techo_presupuestario
    ADD CONSTRAINT techo_presupuestario_id_periodo_fiscal_fkey FOREIGN KEY (id_periodo_fiscal) REFERENCES periodo_fiscal(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: techo_presupuestario_id_unidad_financiadora_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY techo_presupuestario
    ADD CONSTRAINT techo_presupuestario_id_unidad_financiadora_fkey FOREIGN KEY (id_unidad_financiadora) REFERENCES unidad_solicitante(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: techo_presupuestario_id_unidad_solicitante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY techo_presupuestario
    ADD CONSTRAINT techo_presupuestario_id_unidad_solicitante_fkey FOREIGN KEY (id_unidad_solicitante) REFERENCES unidad_solicitante(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: unidad_solicitante_id_nivel_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY unidad_solicitante
    ADD CONSTRAINT unidad_solicitante_id_nivel_fkey FOREIGN KEY (id_nivel) REFERENCES nivel(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: usuario_id_perfil_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_perfil_usuario_fkey FOREIGN KEY (id_perfil_usuario) REFERENCES perfil_usuario(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: usuario_id_unidad_solicitante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_unidad_solicitante_fkey FOREIGN KEY (id_unidad_solicitante) REFERENCES unidad_solicitante(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

