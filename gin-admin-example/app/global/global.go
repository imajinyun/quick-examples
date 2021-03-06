package global

import (
	"gin-admin-example/config"

	"github.com/go-redis/redis"
	"github.com/spf13/viper"
	"go.uber.org/zap"
	"gorm.io/gorm"
)

var (
	GAE_DB     *gorm.DB
	GAE_REDIS  *redis.Client
	GAE_CONFIG config.Server
	GAE_VP     *viper.Viper
	GAE_LOG    *zap.Logger
)
