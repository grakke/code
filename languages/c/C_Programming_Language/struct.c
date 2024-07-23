struct point
{
    int x;
    int y;
};

struct point maxpt = {320, 200};

struct rect
{
    struct point pt1;
    struct point pt2;
};

struct rect screen;

/* makepoint: make a point from x and y components */
struct point makepoint(int x, int y)
{
    struct point temp;
    temp.x = x;
    temp.y = y;
    return temp;
}

struct rect screen;
struct point middle;
struct point makepoint(int, int);

screen.pt1 = makepoint(0, 0);
screen.pt2 = makepoint(XMAX, YMAX);
middle = makepoint((screen.pt1.x + screen.pt2.x) / 2,
                   (screen.pt1.y + screen.pt2.y) / 2));

/* addpoints: add two points */
struct addpoint(struct point p1, struct point p2)
{
    p1.x += p2.x;
    p1.y += p2.y;

    return p1;
}

/* ptinrect: return 1 if p in r, 0 if not */
int ptinrect(struct point p, struct rect r)
{
    return p.x >= r.pt1.x && p.x < r.pt2.x && p.y >= r.pt1.y && p.y < r.pt2.y;
}

#define min(a, b) ((a) < (b) ? (a) : (b))
#define max(a, b) ((a) > (b) ? (a) : (b))

/* canonrect: canonicalize coordinates of rectangle */
struct rect canonrect(struct rect r)
{
    struct rect temp;

    temp.pt1.x = min(r.pt1.x, r.pt2.x);
    temp.pt1.y = min(r.pt1.y, r.pt2.y);
    temp.pt2.x = max(r.pt1.x, r.pt2.x);
    temp.pt2.y = max(r.pt1.y, r.pt2.y);

    return temp;
}

struct key
{
    char *word;
    int count;
} keytab[] = {
    "auto", 0, "break", 0, "case", 0, "char", 0, "const", 0, "continue", 0, "default", 0, /* ... */ "unsigned", 0, "void", 0, "volatile", 0, "while", 0};

#define NKEYS (sizeof keytab / sizeof(struct key))