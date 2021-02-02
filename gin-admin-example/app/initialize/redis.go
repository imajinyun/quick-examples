package initialize

import (
	"gin-admin-example/global"

	"github.com/go-redis/redis"
	"go.uber.org/zap"
)

// Redis to get redis instance.
func Redis() {
	config := global.GAE_CONFIG.Redis
	client := redis.NewClient(&redis.Options{
		Addr:     config.Addr,
		Password: config.Password,
		DB:       config.DB,
	})
	pong, err := client.Ping().Result()
	if err != nil {
		global.GAE_LOG.Error("redis connect ping failed, err:", zap.Any("err", err))
	} else {
		global.GAE_LOG.Info("redis connect ping response:", zap.String("pong", pong))
		global.GAE_REDIS = client
	}
}
