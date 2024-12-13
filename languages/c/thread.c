#include <stdio.h>
#include <unistd.h>
#include <pthread.h>

#define N (1000 * 1000 * 1000)

volatile int g = 0;

void *start(void *arg)
{
        int i;

        for (i = 0; i < N; i++) {
                g++;
        }

        return NULL;
}

int main(int argc, char *argv[])
{
        pthread_t tid;

        // 使用pthread_create函数创建一个新线程执行start函数
        pthread_create(&tid, NULL, start, NULL);

        for (;;) {
                usleep(1000 * 100 * 5);
                printf("loop g: %d\n", g);
                if (g == N) {
                        break;
                }
        }

        pthread_join(tid, NULL); // 等待子线程结束运行

        return 0;
}